
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
        <span class="ebay-value">$0.30</span>
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
            <span class="ebay-value">$0.30</span>
          </div>
          <div class="ebay-property">
            <span>Final Value Fee:</span>
            <span class="ebay-value">$0.30</span>
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
            <span class="ebay-value">$0.30</span>
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
        <span class="ebay-value">$0.30</span>
      </div>
      <div class="ebay-property">
        <span>Profit Margin:</span>
        <span class="ebay-value">0.00%</span>
      </div>
      <div class="ebay-property">
        <span>Total Profit:</span>
        <span class="ebay-value">$0.30</span>
      </div>
    </div>
  </div>

  <div class="latest-news" style="max-width: 100%; margin: 40px auto;">
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
            const response = await fetch('/storage/marketplaces.json');
            
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
    let marketplacesData = [];

    // Load marketplaces and populate the marketplace dropdown
    async function initMarketplaces() {
        marketplacesData = await loadMarketplaces();
        const marketplaceSelect = document.getElementById('marketplaceSelect');
        
        if (marketplacesData) {
            marketplacesData.marketplaces.forEach((marketplace) => {
                const option = document.createElement('option');
                option.value = marketplace.id;
                option.textContent = marketplace.name;
                marketplaceSelect.appendChild(option);
            });
        }
    }

    // Populate categories based on the selected marketplace
    function populateCategories() {
        const marketplaceSelect = document.getElementById('marketplaceSelect');
        const categorySelect = document.getElementById('categorySelect');
        const selectedMarketplaceId = marketplaceSelect.value;

        // Clear the category dropdown
        categorySelect.innerHTML = '<option value="">Select a Category</option>';
        
        if (selectedMarketplaceId) {
            const selectedMarketplace = marketplacesData.marketplaces.find(marketplace => marketplace.id == selectedMarketplaceId);

            if (selectedMarketplace && selectedMarketplace.categories) {
                selectedMarketplace.categories.forEach((category) => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            }
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
  

 @endsection 


 