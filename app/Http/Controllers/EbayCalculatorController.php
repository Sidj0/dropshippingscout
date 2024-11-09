<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EbayCalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        // Retrieve input values
        $itemPrice = $request->input('itemPrice');
        $itemCost = $request->input('itemCost');
        $ebayFeePercent = $request->input('ebayFee');
        $shippingCharge = $request->input('shippingCharge') ?? 0;
        $shippingCost = $request->input('shippingCost') ?? 0;
        $promotionPercent = $request->input('promotion') ?? 0;
        $otherCosts = $request->input('otherCosts') ?? 0;

        // Calculations
        $ebayFee = $itemPrice * ($ebayFeePercent / 100);
        $promotionFee = $itemPrice * ($promotionPercent / 100);
        $totalFees = $ebayFee + $promotionFee;
        
        $totalCost = $itemCost + $shippingCost + $otherCosts;
        $totalRevenue = $itemPrice + $shippingCharge;
        
        $profit = $totalRevenue - $totalFees - $totalCost;
        $profitPercent = $totalRevenue > 0 ? ($profit / $totalRevenue) * 100 : 0;
        $breakEvenProfit = $totalCost + $totalFees;

        // Prepare response
        return response()->json([
            'totalProfit' => number_format($profit, 2),
            'profitPercent' => number_format($profitPercent, 2),
            'ebayFee' => number_format($ebayFee, 2),
            'promotionFee' => number_format($promotionFee, 2),
            'totalFees' => number_format($totalFees, 2),
            'totalCost' => number_format($totalCost, 2),
            'breakEvenProfit' => number_format($breakEvenProfit, 2),
        ]);
    }
}
