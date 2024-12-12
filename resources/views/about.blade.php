
@extends('layouts.master')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('meta_author', $page->meta_author)

@section('og_title', $page->title)
@section('og_description', $page->meta_description)
 
@section('styles')
    <!-- Custom CSS for this view -->
    <link href="{{asset('css/about.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="company">
                        <h1 style="font-size: 60px;">Our company’s journey story</h1>     
                        <h5 style="margin-top:20px ;">A Deep Dive into Dropshipping scout’s Analytics Tool</h5>

                    </div>

<!-- Hero Section Start -->
<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <!-- "Our Company" Section: Content on the Left, Image on the Right -->
            <div class="col-lg-6 order-lg-1 order-2"> 
                <!-- Hero Content Start -->
                <div class="hero-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="text-anime-style-3" style="font-size: 60px;">Our company</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Hero Body Start -->
                    <div class="hero-body">
                        <p class="wow fadeInUp" data-wow-delay="0.5s">The dropshipping analytics tool offers key benefits such as real-time data insights, enabling businesses to make informed decisions quickly.</p>
                        <br>
                        <p>It also provides tracking of sales trends and inventory management, optimizing the supply chain process. Moreover, the tool offers competitive analysis, helping businesses stay ahead in the market.</p>
                    </div>
                    <!-- Hero Body End -->
                </div>
                <!-- Hero Content End -->
            </div>

            <div class="col-lg-6 order-lg-2 order-1">
                <!-- Hero Image Start -->
                <div class="hero-image">
                    <figure class="image-anime reveal">
                        <img src="{{asset('images/hero-img.jpg')}}" alt="">
                    </figure>                            
                </div>
                <!-- Hero Image End -->
            </div>
        </div>
    </div>
</div>
<!-- Hero Section End -->

<!-- Hero Section Start -->
<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <!-- "Our Vision" Section: Image on the Left, Content on the Right -->
            <div class="col-lg-6 order-lg-1 order-1">
                <!-- Hero Image Start -->
                <div class="hero-image">
                    <figure class="image-anime reveal">
                        <img src="{{asset('images/vision.jpg')}}" alt="">
                    </figure>
                </div>
                <!-- Hero Image End -->
            </div>

            <div class="col-lg-6 order-lg-2 order-2">
                <!-- Hero Content Start -->
                <div class="hero-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="text-anime-style-3" style="font-size: 60px;">Our Vision</h2>
                    </div>
                    <!-- Section Title End -->
                    <!-- Hero Body Start -->
                    <div class="hero-body">
                        <p class="wow fadeInUp" data-wow-delay="0.5s">Are you looking to revolutionize your dropshipping business and take it to the next level? Look no further! Our cutting-edge dropshipping data analysis tool is here to transform the way you do business and help you achieve unparalleled success in the e-commerce world.</p>
                        <br>
                        <p>These features make it a valuable asset for companies looking to streamline their dropshipping operations and boost efficiency.</p>
                    </div>
                    <!-- Hero Body End -->
                </div>
                <!-- Hero Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Hero Section End -->
 
<section class="container my-5">
    <!-- Centered Title and Subtitle -->
    <div class="centered-title text-center mb-4">
        <h1 style="color: #1E3F5B; font-size: 50px; font-weight: bold;padding-bottom:10px">Benefits of selling your products <br> With us</h1>
        <h5 class="section-subtitle">in virtual space through communication platforms.</h5>
    </div>
    
      <!-- First Row -->
      <div class="row">
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <div class="icon">
                    <!-- SVG Icon 1 -->
                    <img src="{{asset('./images/stars.svg')}}" alt="">
                </div>
                <div>
                    <h3 class="section-title">Latest trends on eBay</h3>
                    <p class="section-paragraph">Use the “Dropshippers Only” filter to find your fellow competitors, identify the unique selling proposition of your product</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <div class="icon">
                    <!-- SVG Icon 2 -->
                    <img src="{{asset('./images/stars.svg')}}" alt="">
                </div>
                <div>
                    <h3 class="section-title">Popular dropshipping products</h3>
                    <p class="section-paragraph">Use the “Dropshippers Only” filter to find your fellow competitors, identify the unique selling proposition of your product</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <div class="icon">
                    <!-- SVG Icon 3 -->
                  <img src="{{asset('./images/stars.svg')}}" alt="">
                </div>
                <div>
                    <h3 class="section-title">eBay sellers & niches</h3>
                    <p class="section-paragraph">Use the “Dropshippers Only” filter to find your fellow competitors, identify the unique selling proposition of your product</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Second Row -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <div class="icon">
                    <img src="{{asset('./images/stars.svg')}}" alt="">
                </div>
                <div>
                    <h3 class="section-title">Competitive advantage</h3>
                    <p class="section-paragraph">Use the “Dropshippers Only” filter to find your fellow competitors, identify the unique selling proposition of your product</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <div class="icon">
                    <!-- SVG Icon 5 -->
                    <img src="{{asset('./images/stars.svg')}}" alt="">
                </div>
                <div>
                    <h3 class="section-title">Create titles for your products</h3>
                    <p class="section-paragraph">Use the “Dropshippers Only” filter to find your fellow competitors, identify the unique selling proposition of your product</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <div class="icon">
                    <!-- SVG Icon 6 -->
                   <img src="{{asset('./images/stars.svg')}}" alt="">
                </div>
                <div>
                    <h3 class="section-title">Increase sales listing</h3>
                    <p class="section-paragraph">Use the “Dropshippers Only” filter to find your fellow competitors, identify the unique selling proposition of your product</p>
                </div>
            </div>
        </div>
    </div>

</section>

</div>

@endsection
