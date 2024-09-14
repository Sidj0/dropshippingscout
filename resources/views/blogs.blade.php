
@extends('layouts.master')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('meta_author', $page->meta_author)


@section('styles')
    <!-- Custom CSS for this view -->
    <link href="{{asset('css/blog.css')}}" rel="stylesheet">

<Style>
 .blog-item {
    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid #ddd; /* Optional: Add a subtle border around each blog item */
    border-radius: 8px; /* Rounded corners for the blog item */
    padding: 15px; /* Padding inside the blog item */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Add a shadow */
    transition: box-shadow 0.3s ease;
    overflow: hidden; /* Ensure content does not overflow */
}

.post-item-body {
    flex-grow: 1;
}

.category-label {
    position: absolute;
    bottom: 15px; /* Adjust this value to control distance from the bottom */
    left: 15px; /* Adjust this value to control distance from the left */
    color: #638C57; /* Light green background */
   background-color: #C2F750; /* Darker green text color */
    border-radius: 15px; /* Rounded borders */
    padding: 5px 10px;
    font-size: 0.9rem;
    text-align: center;
}

.blog-item:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Hover effect */
}

</Style>

@endsection

@section('content')

	<div class="container">
		<h1 class="title" style="margin-top:0px;">Our blog</h1>
        <h5  class="title" style="margin-top:20px ; font-size: 20px; color: #1E3F5B; font-weight: 400;">Delve into the flexibility and customization our services offer to help your product succeed.</h5>
        <br>
   <!-- Options Start -->
<div class="options-wrapper">
    <div class="options-container">
        <div class="option">All</div>
        <div class="option">eBay</div>
        <div class="option">Shopify</div>
        <div class="option">Woocommerce</div>
        <div class="option">Aliexpress</div>
        <div class="option">Walmart</div>
        <div class="option">Amazon</div>
    </div>
</div>
<!-- Options End -->

    <!-- Latest News Section Start -->
	<div class="latest-news our-blog">
        <div class="container">
			<div class="row g-4">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="blog-item w-100" data-category="{{ $blog->category }}">
                        <div class="post-featured-image">
                            <figure class="image-anime">
                                <a href="{{ route('blogs.show', $blog->slug) }}">
                                    <img src="{{ asset('storage/' .$blog->image) }}" alt="{{ $blog->title }}">
                                </a>
                            </figure>
                        </div>
                        <div class="post-item-body">
                            <p><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->publish_date }}</a></p>
                            <h3><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                            @php
                                $content = json_decode($blog->content, true);
                            @endphp
                            <div class="content-sections">
                                @if($content && is_array($content))
                                    @foreach($content as $section)
                                        @if(isset($section['heading']))
                                            <h4>{{ $section['heading'] }}</h4>
                                        @endif
                                        @if(isset($section['paragraphs']) && is_array($section['paragraphs']))
                                            @foreach($section['paragraphs'] as $paragraph)
                                                <p>{{ Str::limit($paragraph, 150) }}</p>
                                            @endforeach
                                        @endif
                                        @if(isset($section['image']))
                                            <figure class="image-anime">
                                                <img src="{{ asset($section['image']) }}" alt="">
                                            </figure>
                                        @endif
                                    @endforeach
                                @else
                                    <p>{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                                @endif
                            </div>
                        </div>
                        <!-- Category Label -->
                        <div class="category-label">
                            {{ $blog->category }}
                        </div>
                    </div>
                </div>
            @endforeach
            
			</div>		 
		</div>
	</div>
	<!-- Latest News Section End -->
	</div>
	</div>	



<script>
document.addEventListener('DOMContentLoaded', function () {
    const options = document.querySelectorAll('.option');
    const blogItems = document.querySelectorAll('.blog-item');

    options.forEach(option => {
        option.addEventListener('click', function () {
            const selectedCategory = option.textContent.trim();

            // Toggle active class on options
            options.forEach(opt => opt.classList.remove('active'));
            option.classList.add('active');

            // Show or hide blog items based on selected category
            let visibleItemIndex = 0; // To track the position of visible items
            blogItems.forEach(item => {
                const itemCategory = item.dataset.category;

                if (selectedCategory === 'All' || itemCategory === selectedCategory) {
                    item.style.display = 'block';
                    item.style.order = visibleItemIndex; // Reorder the item
                    visibleItemIndex++;
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Simulate a click on the 'All' option to show all items initially
    const defaultOption = document.querySelector('.option:first-child');
    defaultOption.click();
});

// Change options color
document.addEventListener('DOMContentLoaded', function () {
    const options = document.querySelectorAll('.option');

    options.forEach(option => {
        option.addEventListener('click', function () {
            // Remove 'selected' class from all options
            options.forEach(opt => opt.classList.remove('selected'));

            // Add 'selected' class to the clicked option
            this.classList.add('selected');
        });
    });

    // Set the first option as selected by default
    options[0].classList.add('selected');
});

</script>

@endsection
