
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
        <input id="itemIdInput" type="text" placeholder="Check Fees By Item ID">
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
            <input type="number" id="seller-status" placeholder="1"> <!-- Updated ID -->
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
        <span id="total-profit" class="ebay-value">$0.00</span>
        </div>
      <div class="ebay-property">
        <span>Profit %:</span>
        <span id="profit-percent" class="ebay-value">0.00%</span>
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
            <span id="sold-price" class="ebay-value">$0.00</span>
            </div>
          <div class="ebay-property">
            <span>Final Value Fee:</span>
            <span id="total-ebay-fees" class="ebay-value">$0.00</span>
            </div>
          <div class="ebay-property">
            <span>Fixed Transaction Fee:</span>
            <span id="transaction-fee-percent" class="ebay-value">0.00%</span>
            </div>
          <div class="ebay-property">
            <span>Promotion Fees:</span>
            <span id="promotion-fee" class="ebay-value">0.00%</span>
            </div>
          <div class="ebay-property">
            <span>Total eBay Fees:</span>
            <span id="total-ebay-fees" class="ebay-value">0.00%</span>
            </div>
          <div class="ebay-property">
            <span>Total eBay Fees %:</span>
            <span id="total-ebay-fees-percent" class="ebay-value">0.00%</span>
            </div>
        </div>

        <!-- Divider Line -->
        <div class="divider"></div>

        <!-- Right Side of Middle Column -->
        <div class="ebay-middle-section">
          <div class="ebay-header">Other Costs</div>
          <div class="ebay-property">
            <span>Item Cost:</span>
            <span id="item-cost-value" class="ebay-value">$0.00</span>
            </div>
          <div class="ebay-property">
            <span>Shipping Cost:</span>
            <span id="shipping-cost-value" class="ebay-value">$0.00</span>
            </div>
          <div class="ebay-property">
            <span>Other Costs:</span>
            <span id="other-costs-value" class="ebay-value">$0.00</span>
            </div>
          <div class="ebay-property">
            <span>Total Cost:</span>
            <span id="total-cost" class="ebay-value">$0.00</span>
            </div>
          <div class="ebay-property">
            <span>Total Cost %:</span>
            <span id="total-cost-percent" class="ebay-value">0.00%</span>
            </div>
        </div>
      </div>
    </div>

    <!-- Third Column -->
    <div class="ebay-column">
      <div class="ebay-header"></div>
      <div class="ebay-property">
        <span>Break Even Profit:</span>
        <span id="break-even-profit" class="ebay-value">$0.00</span>
        </div>
      <div class="ebay-property">
        <span>Profit Margin:</span>
        <span id="profit-margin" class="ebay-value">0.00%</span>
        </div>
      <div class="ebay-property">
        <span>Total Profit:</span>
        <span id="final-total-profit" class="ebay-value">$0.00</span>
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
    const itemId = document.getElementById('itemIdInput').value;

    // Perform the request to your Laravel backend
    const response = await fetch('/ebay-calculate', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ item_id: itemId })
    });

    const result = await response.json();

    if (result.error) {
        alert(result.error);
    } else {
        // Display the results in your calculator UI
        document.getElementById('sold-price').textContent = `$${result.price}`;
        document.getElementById('total-ebay-fees').textContent = `$${result.ebay_fee.toFixed(2)}`;
        document.getElementById('total-profit').textContent = `$${result.profit.toFixed(2)}`;
        document.getElementById('profit-percent').textContent = `${((result.profit / result.price) * 100).toFixed(2)}%`;
    }
}



// Optional: function to fetch fees by item ID if item ID is used
async function fetchFeesByItemId(itemId) {
    try {
        // Example fetch call - adjust the URL and parameters as needed
        const response = await fetch(`/api/ebay-fees/${itemId}`);
        const data = await response.json();

        // Update the UI with data based on the response
      //  console.log(data);  // For debugging, log the data
        return data;
    } catch (error) {
        console.error('Failed to fetch fees:', error);
    }
}
</script>

 @endsection 


 