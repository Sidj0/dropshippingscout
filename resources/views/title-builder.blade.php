@extends('layouts.master')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('meta_author', $page->meta_author)

@section('styles')
    <!-- Custom CSS for this view -->
    <link href="{{asset('css/faqs.css')}}" rel="stylesheet">
    <link href="{{asset('css/title-builder.css')}}" rel="stylesheet">
    <!-- Add FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
    <div class="header">eBay Title Builder Tool</div>
    <p style="text-align: center;">Delve into the flexibility and customization our services offer to help your product succeed.</p>

    <div class="search-container">
        <input type="text" placeholder="Add keyword of your product">
        <button>Search</button>
    </div>

    <div class="filter-container">
      <div class="filter-row">
          <!-- First row of filters -->
          <div class="filter-box">
              <label for="marketplace">MarketPlace 
                  <i class="fas fa-question-circle" title="Select the marketplace for your product."></i>
              </label>
              <select id="marketplace">
                  <option value="ebay">ebay.com</option>
              </select>
          </div>
          <div class="filter-box">
              <label for="category">Shipping Location 
                  <i class="fas fa-question-circle" title="Select the shipping location."></i>
              </label>
              <select id="category">
                  <option value="" disabled selected>United States</option>
              </select>
          </div>

          <!-- New filter box for Sales Data Range -->
          <div class="filter-box">
              <label for="sales-date-range">Sales Data Range 
                  <i class="fas fa-question-circle" title="Select the date range for sales data."></i>
              </label>
              <select id="sales-date-range" name="sales_date_range">
                  <option value="" disabled selected>Select Date Range</option>
                  <option value="last_7_days">Last 7 Days</option>
                  <option value="last_30_days">Last 30 Days</option>
                  <option value="this_month">This Month</option>
                  <option value="last_month">Last Month</option>
              </select>
          </div>

          <div class="filter-box">
              <label for="item-price">Exclude Phrase 
                  <i class="fas fa-question-circle" title="Enter phrases you want to exclude from the search."></i>
              </label>
              <input type="text" id="item-price" placeholder="Ex: s1s2s3">
          </div>
      </div>
    </div>


    <div class="filter-container">
  <div class="filter-row">
    <!-- First row of filters -->
    <div class="filter-box" style="width: 95%;">
      <label for="marketplace">Title Combine 
        <i class="fas fa-question-circle" title="Select the marketplace for your product."></i>
      </label>
      <div class="input-with-icon">
        <input type="text" id="item-price" placeholder="Click On Keyword to combine your title">
        <i class="fas fa-copy copy-icon" title="Copy"></i>
      </div>
    </div>
  </div>
</div>
 


    <!-- results section -->
    <div class="main-container">
    <div class="results-container">
    <!-- Long Tail Keywords Section -->
    <div class="results-section">
      <div class="section-header">
        <h2>Long Tail Keywords</h2>
        <div class="search-bar">
          <input type="text" placeholder="Search...">
          <i class="search-icon">🔍</i>
        </div>
      </div>
      <table class="results-table">
        <thead>
          <tr>
            <th>Keyword</th>
            <th>Average Searches</th>
            <th>Competition Level</th>
            <th>Sales</th>
            <th></th> <!-- Empty header for Copy icon column -->
          </tr>
        </thead>
        <tbody>
          <!-- Sample row data -->
          <tr>
            <td>Example Keyword</td>
            <td>1000</td>
            <td>High</td>
            <td>200</td>
            <td><i class="copy-icon">📋</i></td>
          </tr>
          <!-- More rows as needed -->
        </tbody>
      </table>
      <div class="pagination">
        <span>&laquo;</span>
        <span>1 of 5 pages</span>
        <span>&raquo;</span>
      </div>
    </div>

    <!-- Generic Keywords Section -->
    <div class="results-section">
      <div class="section-header">
        <h2>Generic Keywords</h2>
        <div class="search-bar">
          <input type="text" placeholder="Search...">
          <i class="search-icon">🔍</i>
        </div>
      </div>
      <table class="results-table">
        <thead>
          <tr>
            <th>Keyword</th>
            <th>Competition Level</th>
            <th>Sales</th>
            <th></th> <!-- Empty header for Copy icon column -->
          </tr>
        </thead>
        <tbody>
          <!-- Sample row data -->
          <tr>
            <td>Sample Keyword</td>
            <td>Low</td>
            <td>150</td>
            <td><i class="copy-icon">📋</i></td>
          </tr>
          <!-- More rows as needed -->
        </tbody>
      </table>
      <div class="pagination">
        <span>&laquo;</span>
        <span>1 of 3 pages</span>
        <span>&raquo;</span>
      </div>
    </div>
  </div>
</div>

    <!-- end of results section -->

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
@endsection
