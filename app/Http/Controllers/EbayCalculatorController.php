<?php

// EbayCalculatorController.php
use Illuminate\Support\Facades\Http;

class EbayCalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        $itemId = $request->input('item_id');

        // Call the eBay Browse API through RapidAPI to validate and fetch item data
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'ebay-browse.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'), // Store your RapidAPI key in .env
        ])->get("https://ebay-browse.p.rapidapi.com/item/v1/$itemId");

        if ($response->failed()) {
            return response()->json(['error' => 'Invalid Item ID or failed to retrieve item data.']);
        }

        $itemData = $response->json();

        // Extract necessary data for calculations
        $price = $itemData['price']['value'];
        $category = $itemData['category']['categoryId'];
        $marketplace = $itemData['marketplaceId'];

        // Proceed with fee calculations
        $calculatedFees = $this->calculateFees($price, $category, $marketplace);

        return response()->json($calculatedFees);
    }

    public function calculateFeesWithAlgopix($price, $itemCost, $shippingCost, $marketplace)
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'algopix-market-research.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
        ])->post("https://algopix-market-research.p.rapidapi.com/fees", [
            'price' => $price,
            'cost' => $itemCost,
            'shipping' => $shippingCost,
            'marketplace' => $marketplace,
        ]);
    
        if ($response->failed()) {
            return ['error' => 'Failed to retrieve fee data from Algopix'];
        }
    
        return $response->json();  // Contains fee and profit breakdown from Algopix
    }
    

    private function getMarketplaceFeePercent($marketplace, $category)
    {
        // Example of predefined fee percentages
        $fees = [
            'EBAY_US' => ['default' => 12, 'electronics' => 8],
            'EBAY_UK' => ['default' => 10, 'fashion' => 7],
        ];

        return $fees[$marketplace][$category] ?? $fees[$marketplace]['default'];
    }
}
