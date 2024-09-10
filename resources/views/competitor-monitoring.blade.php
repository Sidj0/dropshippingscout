@extends('layouts.master')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('meta_author', $page->meta_author)

@section('styles')
    <!-- Custom CSS for this view -->
    <link href="{{asset('css/competitor-monitoring.css')}}" rel="stylesheet">
@endsection


@section('content')
    <div class="container">
        <h1 class="title" style="margin-top:0px;">Competitor Monitoring</h1>
        <h5  class="title" style="margin-top:20px ; font-size: 20px; color: #1E3F5B; font-weight: 550;  ">One way to gain a competitive edge is by monitoring your competitors.</h5>
        <br>
          <div class="con-left">
            <div class="left-column">
              <img src="./images/ebay.jpg" alt="ebay" width="118.32px" height="45px" style="margin-bottom: 20px;">
        
              <h2>Competitor Research</h2>
              
              <br>
              <p style="color: #1E3F5B; font-size: 16px; font-weight: 550;">By analyzing search volume, sales data, and social media <br>
                 mentions, these tools can pinpoint products that are <br>
                  gaining traction in the market.</p>
                 <br>
              <button class="btn-default" style="background: var(--primary-500) 0% 0% no-repeat padding-box;
              border: 1px solid var(--primary-500);
              color: #1E3F5B
              ;
              background: #AFB9FA 0% 0% no-repeat padding-box;
              border: 1px solid #AFB9FA; border-radius: 8px; opacity: 1;"   >Read More</button>
            </div>
            
            <div class="right-column">
              <img src="./images/P S.jpg" alt="Example Image">
            </div>
          </div>
         
         <br>

        <div class="custom-container">
          <div class="custom-image-section">
            <img src="images/Rectangle.jpg" alt="Main Image" class="custom-main-img">
          </div>
          <div class="custom-info-section">
            <div class="custom-overlay-container">
              <img src="images/shopify.jpg" alt="Title Image" class="custom-title-img">
            </div>
            <h1 class="custom-heading">Competitor Research</h1>
            <p class="custom-text">Drive traffic and sales, ensuring your products are easily discoverable by potential customers.</p>
            <button class="btn-default" style="background: var(--primary-500) 0% 0% no-repeat padding-box;
            border: 1px solid var(--primary-500);
            color: #1E3F5B
            ;
            background: #AFB9FA 0% 0% no-repeat padding-box;
            border: 1px solid #AFB9FA; border-radius: 8px; opacity: 1;  width: 200px;
            height: 46px;"   >Read More</button>
          </div>
        </div>
        
 
   <!-- Latest News Section Start -->
<div class="latest-news" style="max-width: 100%; margin: 40px auto;">
    <div>
        <h2>Reach out to suppliers for details on <br>
          their offerings and pricing.</h2>
    </div>
    <div class="button-container">
        <button class="btn-default">Start for $1 Trial</button>
  </div>
</div>


<div class="custom-container">
  <div class="custom-image-section">
    <img src="images/Rectangle.jpg" alt="Main Image" class="custom-main-img">
  </div>
  <div class="custom-info-section">
    <div class="custom-overlay-container">
      <img src="images/shopify.jpg" alt="Title Image" class="custom-title-img">
    </div>
    <h1 class="custom-heading">Shopify best competitors</h1>
    <p class="custom-text">Drive traffic and sales, ensuring your products are easily discoverable by potential customers.</p>
    <button class="btn-default" style="background: var(--primary-500) 0% 0% no-repeat padding-box;
    border: 1px solid var(--primary-500);
    color: #1E3F5B
    ;
    background: #AFB9FA 0% 0% no-repeat padding-box;
    border: 1px solid #AFB9FA; border-radius: 8px; opacity: 1;  width: 200px;
    height: 46px;"   >Read More</button>
  </div>
</div>
    </div>
    </div>
 

<div class="rec-container">
  <div class="rec-content">
      <div class="rec-text">
          <p class="rec-p" >Scouting for suppliers<span style="color: #C2F750;"> suppliers </span> <br>  can give your business a competitive edge.</p>
      </div>
      <button class="btn-default" style="background: var(--primary-500) 0% 0% no-repeat padding-box;
      border: 1px solid var(--primary-500);
      color: #1E3F5B
      ;
      background:#C2F750 0% 0% no-repeat padding-box;
      border: 1px solid #C2F750; border-radius: 8px; opacity: 1; width: 342px; height: 51px; "   >Gain an edge now!</button>
  </div>
</div>
@endsection