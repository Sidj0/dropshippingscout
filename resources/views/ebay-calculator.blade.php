
@extends('layouts.master')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('meta_author', $page->meta_author)


@section('styles')
    <!-- Custom CSS for this view -->
    <link href="{{asset('css/faqs.css')}}" rel="stylesheet">
    <link href="{{asset('css/ebay-calculator.css')}}" rel="stylesheet">

 
<style>
  .ebay-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    width: 100%;
    max-width: 1200px;
    margin: auto;
    padding-bottom: 60px;
  }

  .ebay-column {
    flex: 2;
    padding: 20px;
    border-radius: 10px;
    background-color: #E2E7FB;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .ebay-middle-column {
    flex: 4;
    background-color: #EDEFFC;
  }

  .ebay-middle-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
  }

  .ebay-middle-section {
    flex: 1;
    padding: 20px;
  }

  .divider {
    width: 1px;
    background-color: #ccc;
    margin: 0 10px;
  }

  .ebay-header {
    font-weight: bold;
    margin-bottom: 15px;
    font-size: 1.2em;
  }

  .ebay-property {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }

  .ebay-value {
    color: #32CD32; /* Light green color */
  }

  /* Responsive styling */
  @media (max-width: 768px) {
    .ebay-container {
      flex-direction: column;
    }
    .ebay-middle-column {
      flex: 1;
    }
    .ebay-middle-container {
      flex-direction: column;
    }
    .divider {
      display: none;
    }
  }
</style>
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
              <select id="marketplace">
                  <option value="ebay">ebay.com</option>
              </select>
          </div>
          <div class="filter-box">
              <label for="category">Category</label>
              <select id="category">
                  <option value="" disabled selected>Select Category</option>
                  <!-- Add categories here -->
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
  <script>
    document.querySelector("button").addEventListener("click", async () => {
        const data = {
            itemPrice: document.getElementById("item-price").value,
            itemCost: document.getElementById("item-cost").value,
            ebayFee: document.getElementById("ebay-fee").value,
            shippingCharge: document.getElementById("shipping-charge").value,
            shippingCost: document.getElementById("shipping-cost").value,
            promotion: document.getElementById("promotion").value,
            otherCosts: document.getElementById("other-costs").value,
        };

        try {
            const response = await fetch('/api/calculate-fees', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });

            const result = await response.json();

            document.querySelector(".total-profit .ebay-value").innerText = `$${result.totalProfit}`;
            document.querySelector(".profit-percent .ebay-value").innerText = `${result.profitPercent}%`;
            document.querySelector(".ebay-fee .ebay-value").innerText = `$${result.ebayFee}`;
            document.querySelector(".promotion-fee .ebay-value").innerText = `$${result.promotionFee}`;
            document.querySelector(".total-cost .ebay-value").innerText = `$${result.totalCost}`;
            document.querySelector(".break-even-profit .ebay-value").innerText = `$${result.breakEvenProfit}`;

        } catch (error) {
            console.error("Error calculating fees:", error);
        }
    });
</script>

 @endsection 


 