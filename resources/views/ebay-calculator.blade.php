
@extends('layouts.master')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('meta_author', $page->meta_author)


@section('styles')
    <!-- Custom CSS for this view -->
    <link href="{{asset('css/faqs.css')}}" rel="stylesheet">
    <link href="{{asset('css/ebay-calculator.css')}}" rel="stylesheet">

 @endsection

@section('content')
    <div class="header">eBay Fee Calculator</div>
    <p style="text-align: center;">Delve into the flexibility and customization oure services offer to help your product succeed.</p>

    <div class="search-container">
        <input type="text" placeholder="Check Fees By Item ID">
        <button>Search</button>
    </div>

    <div class="filter-container">
      <div class="filter-row">
          <!-- First row of filters -->
          <div class="filter-box">
              <label for="marketplace">MarketPlace</label>
              <select id="marketplaceSelect" onchange="populateCategories()">
                <option value="">Select a Marketplace</option>
              </select>
          </div>
          <div class="filter-box">
              <label for="category">Category</label>
              <select id="categorySelect">
                <option value="">Select a Category</option>
             </select>
          </div>
          <div class="filter-box">
              <label for="item-price">Item Sold Price</label>
              <input type="number" id="item-price" placeholder="Enter Price">
          </div>
          <div class="filter-box">
              <label for="item-cost">Item Cost</label>
              <input type="number" id="item-cost" placeholder="Enter Cost">
          </div>
          <div class="filter-box">
              <label for="ebay-fee">eBay Fee %</label>
              <input type="number" id="ebay-fee" placeholder="Enter Fee %">
          </div>
      </div>
  
      <!-- Second row of filters (hidden by default) -->
      <div class="filter-row" id="second-filter-row" style="display: none;">
          <div class="filter-box">
              <label for="shipping-charge">Shipping Charge</label>
              <input type="number" id="shipping-charge" placeholder="Enter Charge">
          </div>
          <div class="filter-box">
              <label for="shipping-cost">Shipping Cost</label>
              <input type="number" id="shipping-cost" placeholder="Enter Cost">
          </div>
          <div class="filter-box">
              <label for="promotion">Promotion %</label>
              <input type="number" id="promotion" placeholder="Enter Promotion %">
          </div>
          <div class="filter-box">
              <label for="other-costs">Other Costs</label>
              <input type="number" id="other-costs" placeholder="Enter Other Costs">
          </div>
          <div class="filter-box">
              <label for="ebay-store">eBay Store</label>
              <input type="number" id="ebay-store" placeholder="1">
          </div>
          <div class="filter-box">
            <label for="other-costs">Seller Status</label>
            <input type="number" id="other-costs" placeholder="1">
        </div>
      </div>
  
      <!-- More Options Link -->
      <div style="text-align: center; margin: 20px 0;" id="more-options-container">
          <a href="javascript:void(0);" id="more-options-link" class="more-options-link">
              More Options
              <span class="arrow down"></span>
          </a>
      </div>
  </div>
  <div class="ebay-container">
    <!-- First Column -->
    <div class="ebay-column">
      <div class="ebay-header">Your Profit</div>
      <div class="ebay-property">
        <span>Total Profit:</span>
        <span class="ebay-value">$0.00</span>
      </div>
      <div class="ebay-property">
        <span>Profit %:</span>
        <span class="ebay-value">0.00%</span>
      </div>
    </div>

    <!-- Middle Column with Two Sections -->
    <div class="ebay-column ebay-middle-column">
      <div class="ebay-middle-container">
        <!-- Left Side of Middle Column -->
        <div class="ebay-middle-section">
          <div class="ebay-header">Profit & Fees Breakdown</div>
          <div class="ebay-property">
            <span>Sold Price:</span>
            <span class="ebay-value">$0.00</span>
          </div>
          <div class="ebay-property">
            <span>Final Value Fee:</span>
            <span class="ebay-value">$0.00</span>
          </div>
          <div class="ebay-property">
            <span>Fixed Transaction Fee:</span>
            <span class="ebay-value">0.00%</span>
          </div>
          <div class="ebay-property">
            <span>Promotion Fees:</span>
            <span class="ebay-value">0.00%</span>
          </div>
          <div class="ebay-property">
            <span>Total eBay Fees:</span>
            <span class="ebay-value">0.00%</span>
          </div>
          <div class="ebay-property">
            <span>Total eBay Fees %:</span>
            <span class="ebay-value">0.00%</span>
          </div>
        </div>

        <!-- Divider Line -->
        <div class="divider"></div>

        <!-- Right Side of Middle Column -->
        <div class="ebay-middle-section">
          <div class="ebay-header">Other Costs</div>
          <div class="ebay-property">
            <span>Item Cost:</span>
            <span class="ebay-value">$0.00</span>
          </div>
          <div class="ebay-property">
            <span>Shipping Cost:</span>
            <span class="ebay-value">0.00%</span>
          </div>
          <div class="ebay-property">
            <span>Other Costs:</span>
            <span class="ebay-value">0.00%</span>
          </div>
          <div class="ebay-property">
            <span>Total Cost:</span>
            <span class="ebay-value">0.00%</span>
          </div>
          <div class="ebay-property">
            <span>Total Cost %:</span>
            <span class="ebay-value">0.00%</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Third Column -->
    <div class="ebay-column">
      <div class="ebay-header"></div>
      <div class="ebay-property">
        <span>Break Even Profit:</span>
        <span class="ebay-value">$0.00</span>
      </div>
      <div class="ebay-property">
        <span>Profit Margin:</span>
        <span class="ebay-value">0.00%</span>
      </div>
      <div class="ebay-property">
        <span>Total Profit:</span>
        <span class="ebay-value">$0.00</span>
      </div>
    </div>
  </div>

  <div class="latest-news" style="max-width: 80%; margin: 40px auto;">
    <div>
        <h2>Reach out to suppliers for details on <br>
          their offerings and pricing.</h2>
    </div>
    <div class="button-container">
      <a href="https://app.dropshippingscout.com/pricing">
        <button class="btn-default">Start for $1 Trial</button>
      </a>
  </div>
</div>

<div class="faq-section">
  <div class="container">
      <div class="row">
          <div class="col-lg-10 offset-lg-1 col-md-12 offset-md-0">
              <div class="accordion-title"><h3 class="accordion-MainTitle"></h3></div>
              <div class="faq-accordion" id="accordion">
                  @foreach($faqs as $faq)
                      <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s" data-category="{{ strtolower(str_replace(' ', '-', $faq->category_name)) }}">
                          <h2 class="accordion-header" id="heading{{ $faq->id }}">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                  {{ $faq->question }}
                              </button>
                          </h2>
                          <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}"
                               data-bs-parent="#accordion">
                              <div class="accordion-body">
                                  <p>{{ $faq->answer }}</p>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</div>

<script>
    // Load the JSON file
    async function loadMarketplaces() {
        try {
            const response = await fetch('/storage/marketplaces.json');  // Make sure this path is correct
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();
            console.log(data);  // Output the marketplaces data to the console
            return data;
        } catch (error) {
            console.error('Failed to load marketplaces:', error);
        }
    }

    // Initialize marketplaces data
    let marketplacesData = {};

    // Load marketplaces and populate the marketplace dropdown
    async function initMarketplaces() {
        marketplacesData = await loadMarketplaces();
        const marketplaceSelect = document.getElementById('marketplaceSelect');

        if (marketplacesData) {
            for (const [key, marketplace] of Object.entries(marketplacesData)) {
                const option = document.createElement('option');
                option.value = key;
                option.textContent = marketplace.name;
                marketplaceSelect.appendChild(option);
            }
        }
    }

    // Populate categories based on the selected marketplace
    function populateCategories() {
        const marketplaceSelect = document.getElementById('marketplaceSelect');
        const categorySelect = document.getElementById('categorySelect');
        const selectedMarketplaceKey = marketplaceSelect.value;

        // Clear the category dropdown
        categorySelect.innerHTML = '<option value="">Select a Category</option>';

        if (selectedMarketplaceKey && marketplacesData[selectedMarketplaceKey]) {
            const categories = marketplacesData[selectedMarketplaceKey].categories;

            categories.forEach((category) => {
                const option = document.createElement('option');
                option.value = category;
                option.textContent = category;
                categorySelect.appendChild(option);
            });
        }
    }

    // Initialize marketplaces when the page loads
    window.onload = initMarketplaces;
    </script>
  
  <!-- Include your JavaScript file or script tag here -->
  <script>
      document.getElementById('more-options-link').addEventListener('click', function() {
          var secondRow = document.getElementById('second-filter-row');
          var linkText = this; // Reference to the "More Options" link
          var arrow = linkText.querySelector('.arrow');
  
          // Show or hide the second row
          if (secondRow.style.display === 'none' || secondRow.style.display === '') {
              // Show the second row
              secondRow.style.display = 'flex'; // or 'block' based on your layout preference
  
              // Move the "More Options" link below the second row
              var filterContainer = document.querySelector('.filter-container');
              filterContainer.appendChild(linkText.parentNode); // Append it after the second row
  
              // Change arrow direction
              arrow.classList.remove('down');
              arrow.classList.add('up');
  
              // Change the text to "Less Options"
              linkText.innerHTML = 'Less Options <span class="arrow up"></span>';
          } else {
              // Hide the second row
              secondRow.style.display = 'none';
  
              // Move the "More Options" link back to its original position
              var filterContainer = document.querySelector('.filter-container');
              filterContainer.insertBefore(linkText.parentNode, secondRow); // Insert before second row
  
              // Reset arrow direction
              arrow.classList.remove('up');
              arrow.classList.add('down');
  
              // Change the text back to "More Options"
              linkText.innerHTML = 'More Options <span class="arrow down"></span>';
          }
      });
  </script>
  
<!-- Add this within your script section or a separate JS file -->
<script>
    document.querySelector('.search-container button').addEventListener('click', performCalculation);

    async function performCalculation() {
        // Capture input values
        const itemId = document.querySelector('.search-container input').value;
        const marketplaceKey = document.getElementById('marketplaceSelect').value;
        const category = document.getElementById('categorySelect').value;
        const soldPrice = parseFloat(document.getElementById('item-price').value) || 0;
        const itemCost = parseFloat(document.getElementById('item-cost').value) || 0;
        const ebayFeePercentage = parseFloat(document.getElementById('ebay-fee').value) || 0;
        const shippingCharge = parseFloat(document.getElementById('shipping-charge').value) || 0;
        const shippingCost = parseFloat(document.getElementById('shipping-cost').value) || 0;
        const promotionPercentage = parseFloat(document.getElementById('promotion').value) || 0;
        const otherCosts = parseFloat(document.getElementById('other-costs').value) || 0;

        // Ensure a marketplace and required fields are selected
        if (!marketplaceKey || !soldPrice || !itemCost) {
            alert('Please select a marketplace and enter required values for the calculation.');
            return;
        }

        // Retrieve marketplace data for fee calculations
        const marketplace = marketplacesData[marketplaceKey];
        if (!marketplace) {
            alert('Selected marketplace data not available.');
            return;
        }

        // Calculate eBay fees, promotion fees, total costs, and profit
        const ebayFee = (soldPrice * ebayFeePercentage) / 100;
        const promotionFee = (soldPrice * promotionPercentage) / 100;
        const totalCost = itemCost + ebayFee + shippingCost + promotionFee + otherCosts;
        const totalEbayFees = ebayFee + promotionFee;
        const profit = soldPrice - totalCost - shippingCharge;
        const profitPercentage = (profit / soldPrice) * 100;

        // Display calculated values
        updateUI(profit, profitPercentage, totalEbayFees, totalCost);
    }

    function updateUI(profit, profitPercentage, totalEbayFees, totalCost) {
        // Update UI elements with calculated values
        document.querySelector('.ebay-column .ebay-value:nth-child(2)').textContent = `$${profit.toFixed(2)}`;
        document.querySelector('.ebay-column .ebay-value:nth-child(3)').textContent = `${profitPercentage.toFixed(2)}%`;
        document.querySelector('.ebay-middle-column .ebay-property:nth-child(4) .ebay-value').textContent = `$${totalEbayFees.toFixed(2)}`;
        document.querySelector('.ebay-middle-section .ebay-property:nth-child(8) .ebay-value').textContent = `$${totalCost.toFixed(2)}`;
    }
</script>

 @endsection 


 