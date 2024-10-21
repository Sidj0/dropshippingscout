
@extends('layouts.master')

@section('title', $blog->title)
@section('meta_description', $blog->meta_description)
@section('meta_keywords', $blog->meta_keywords)
@section('meta_author', $blog->meta_author)

@section('styles')
    <!-- Custom CSS for this view -->
    <link href="{{asset('css/blog-details.css')}}" rel="stylesheet">
@endsection
      
@section('content')

<div class="container">
    <a href="{{ route('blogs.userIndex') }}"><img src="{{ asset('images/left-arrow.svg') }}" class="back-arrow" alt="Back"></a>
    <h1 class="title">{{ $blog->title }}</h1>
    <div class="rowElements">
        <button class="button-shopify">{{ $blog->category }}</button>
        <ul class="info-list">
            <li><span class="date">{{ $blog->publish_date }}</span></li>
            <li><span class="author">By: {{ $blog->author }}</span></li>
            <li>
                <img id="like-button" src="{{ asset('images/heart.svg') }}" alt="Likes" style="cursor: pointer;">
                <span id="like-count" class="number">{{ $blog->likes }}</span>
            </li>
        </ul>
    </div>
    

             @if ($blog->video_url)
                <iframe width="100%" height="415" src="https://www.youtube.com/embed/{{ \Str::after($blog->video_url, 'v=') }}" frameborder="0" allowfullscreen></iframe>
            @else
                <a href="{{ route('blogs.show', $blog->slug) }}">
                    <img src="{{ asset('storage/' .$blog->image) }}" alt="{{ $blog->title }}">
                </a>
            @endif
         

    <div class="content-container">
        <div class="content">
            {!! $blog->content !!}
        </div>
        <div class="sidebar">
            <div class="social">
                <ul>
                    <li><a href="https://www.tiktok.com/@dropshipping.scout"><img src="{{ asset('images/Tiktok.svg') }}" alt=""></a></li> 
                    {{-- <li><a href="#"><img src="{{ asset('images/Whatsapp.svg') }}" alt=""></a></li> --}}
                    <li><a href="https://www.linkedin.com/company/dropshipping-scout"><img src="{{ asset('images/Linkedin.svg') }}" alt=""></a></li>
                    <li><a href="https://www.instagram.com/dropshipping.scout?igsh=bWQ0cWgwOW4zYzl5"><img src="{{ asset('images/Instagram.svg') }}" alt=""></a></li>
                    <li><a href="https://youtube.com/@dropshipping.scout.?feature=shared"><img src="{{ asset('images/YouTube.svg') }}" alt=""></a></li>
                    {{-- <li><a href="#"><img src="{{ asset('images/X.svg') }}" alt=""></a></li> --}}
                    <li><a href="https://www.facebook.com/dropshipping.scout?mibextid=ZbWKwL"><img src="{{ asset('images/facebook.svg') }}" alt=""></a></li>
                </ul>
            </div>

            <h3 style="color: #3545D6;padding-bottom: 0px;padding-top: 15px;font-weight:700" class="table-content">Table of Contents</h3>
            <ul>
                @foreach($headings as $heading)
                    <li class="table-content" style="white-space: nowrap;">
                        <a href="#{{ $heading['id'] }}" style="padding: 0; margin: 0; display: inline;">
                            {{ $heading['text'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
            
            
        </div>
    </div>

 <!-- related blogs -->
 <div class="latest-news">
    <div class="container homeBlogContainer">
        <div class="row section-row align-items-center">
            <div class="col-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <div class="title-with-lines">
                        <span class="line-left"></span>
                        <h2 class="text-anime-style-3">Related blogs</h2>
                        <span class="line-right"></span>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
        </div>
    </div>
</div>


        <div class="row" style="padding-bottom: 50px;">
            @foreach ($relatedBlogs as $blog)
            <div class="col-lg-4 col-md-6">
                <!-- Blog Item Start -->
                <div class="blog-item wow fadeInUp" data-wow-delay="0.75s">
                    <!-- Blog Image Start -->
                    <div class="post-featured-image">
                        <a href="{{ route('blogs.show', $blog->slug) }}">
                        <figure class="image-anime">
                                <img src="{{ asset('storage/' .$blog->image) }}" alt="{{ $blog->title }}">
                        </figure>
                    </a>

                    </div>
                    <!-- Blog Image End -->

                    <!-- Blog Content Start -->
                    <div class="post-item-body">
                                                
                          <a href="{{ route('blogs.show', $blog->slug) }}" style="color: #1E3F5B">
                            {{ $blog->created_at }}</a>
                   
                            <a href="{{ route('blogs.show', $blog->slug) }}"> <h2 class="homeBlogParagraph">{{ $blog->title }}</h2>    </a>                        
                    </div>
                    <!-- Category Label -->
                    <div class="category-label">
                        {{ $blog->category }}
                    </div>
                    <!-- Blog Content End -->
                </div>
                <!-- Blog Item End -->
            </div>
        @endforeach
        </div>



<!-- end of related blogs -->

</div>               
</div>

<script>
    document.getElementById('like-button').addEventListener('click', function() {
    const blogId = {{ $blog->id }};
    const likeButton = document.getElementById('like-button');
    const likeCount = document.getElementById('like-count');

    fetch(`/blogs/${blogId}/like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
    })
    .then(response => response.json())
    .then(data => {
        likeCount.textContent = data.likes; // Update the likes count
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

</script>
@endsection
