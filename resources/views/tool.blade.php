
@extends('layouts.master')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('meta_author', $page->meta_author)

@section('styles')
    <!-- Custom CSS for this view -->
     <link href="{{asset('css/tools.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
<!-- Tool Page Title and Description -->
<h1 class="title" style="margin-top:0px;">{{$page->content_header}}</h1>
<h5  class="title" style="margin-top:20px ; font-size: 20px; color: #1E3F5B; font-weight: 550;">{{$page->content_subheader}}</h5>
<br>

@if (!empty($page['image_1']))
  <div class="con-left">
    <div class="left-column">
 
      <h2>{{$page->header_1}}</h2>
      
      <br>
      <p style="color: #1E3F5B; font-size: 16px; font-weight: 400;">{{$page->paragraph_1}}</p>
         <br>
      <button class="btn-default" style="background: var(--primary-500) 0% 0% no-repeat padding-box;
      border: 1px solid var(--primary-500);
      color: white
      ;
      background: #3545D6 0% 0% no-repeat padding-box;
      border: 1px solid #AFB9FA; border-radius: 8px;font-size: 13px;">start for $1 Trail</button>
      
      <p style="color: #1E3F5B; font-size: 13px; font-weight: 550;padding-top:10px;width: max-content;">
       
        <img src="{{asset('images/verified.png')}}" style="max-width: 35px"/>
        
        Trusted by 200.000 entrepreneurs like you</p>

      </div>
    
    <div class="right-column">
      <img src="{{ asset('storage/' . $page['image_1']) }}" alt="Example Image">
    </div>

  </div>
  @endif
 
 <br>

 @if (!empty($page['image_2']))
 <div class="con-left">
    <div class="right-column">
        <img src="{{ asset('storage/' . $page['image_2']) }}" alt="Example Image">
    </div>

    <div class="left-column">
        <h2 style="width: max-content;">{{$page->header_2}}</h2>
        <br>
        <p style="color: #1E3F5B; font-size: 16px; font-weight: 400;">
            {{$page->paragraph_2}}
        </p>
        <br>
      <a href="https://app.dropshippingscout.com/pricing">  <button class="btn-default" style="background: var(--primary-500) 0% 0% no-repeat padding-box;
            border: 1px solid var(--primary-500);
            color: white;
            background: #3545D6 0% 0% no-repeat padding-box;
            border: 1px solid #AFB9FA; border-radius: 8px; font-size: 13px;">
            start for $1 Trial
        </button>
    </a>
    </div>
</div>
@endif

@if (!empty($page['image_3']))
<div class="con-left">
 <div class="left-column">

   <h2 style="width: max-content;">{{$page->header_3}}</h2>
   
   <br>
   <p style="color: #1E3F5B; font-size: 16px; font-weight: 400;">{{$page->paragraph_3}}</p>
      <br>
   <button class="btn-default" style="background: var(--primary-500) 0% 0% no-repeat padding-box;
   border: 1px solid var(--primary-500);
   color: white
   ;
   background: #3545D6 0% 0% no-repeat padding-box;
   border: 1px solid #AFB9FA; border-radius: 8px;font-size: 13px;">start for $1 Trail</button>
 </div>
 <div class="right-column">
   <img src="{{ asset('storage/' . $page['image_3']) }}" alt="Example Image">
 </div>
</div>
@endif

@if (!empty($page['image_4']))
<div class="con-left">
<div class="right-column">
    <img src="{{ asset('storage/' . $page['image_4']) }}" alt="Example Image">
</div>

<div class="left-column">
    <h2 style="width: max-content;">{{$page->header_4}}</h2>
    <br>
    <p style="color: #1E3F5B; font-size: 16px; font-weight: 400;">
        {{$page->paragraph_4}}
    </p>
    <br>
    <button class="btn-default" style="background: var(--primary-500) 0% 0% no-repeat padding-box;
        border: 1px solid var(--primary-500);
        color: white;
        background: #3545D6 0% 0% no-repeat padding-box;
        border: 1px solid #AFB9FA; border-radius: 8px; font-size: 13px;">
        start for $1 Trial
    </button>
</div>
</div>
@endif

    <div class="container faqHead" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">

      <h2 style="color: #1E3F5B;padding-top: 20px;">
          <span style="color:#3545D6;">F</span>AQ
      </h2>
      <p style="color: #1E3F5B;">Helpful resource for users to find quick answers</p>
  
  </div>

  <!-- FAQs Page Start -->
  <div class="faq-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 offset-md-0">
                @if($Faq && $Faq->count() > 0)
                    @foreach($Faq->groupBy('category') as $category => $categoryFaqs)
                        <div class="accordion-title"><h3 class="accordion-MainTitle">{{ $category }}</h3></div>
                        <div class="faq-accordion" id="accordion{{ str_replace(' ', '', $category) }}">
                            @foreach($categoryFaqs as $faq)
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}"
                                        data-bs-parent="#accordion{{ str_replace(' ', '', $category) }}">
                                        <div class="accordion-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <p style="text-align: center">No FAQs available at the moment.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- FAQs Page End -->
</div>
    </div>

 
 <!-- Latest News Section Start -->
 <div class="latest-news" style="max-width: 1200px;; margin: 40px auto;">
  <div>
      <h2>Reach out to suppliers for details on <br>
        their offerings and pricing.</h2>
  </div>
  <div class="button-container">
      <button class="btn-default">Start for $1 Trial</button>
</div>
</div>

<!-- Latest News Section End -->

@endsection