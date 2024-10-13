@extends('layouts.master')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('meta_author', $page->meta_author)

@section('styles')
    <!-- Custom CSS for this view -->
    <link href="{{ asset('css/faqs.css') }}" rel="stylesheet">
   
@endsection

@section('content')
    <div class="header">Looking for help? Here are our most frequently asked questions.</div>

    <div class="search-container">
        <input type="text" id="faq-search" placeholder="Search about what you are looking for…">
        <button onclick="filterFaqs()">Search</button>
    </div>

    <div class="info-text">
        Can’t find the answer to a question you have? <a href="{{ url('contact-us') }}">Contact us</a>
    </div>

    <div class="options-wrapper">
        <div class="options-container">
            <div class="option" data-filter="all">All</div>
            <div class="option" data-filter="Get-Started">Get Started</div>
            <div class="option" data-filter="Pricing-Subscriptions">Pricing & Subscriptions</div>
            <div class="option" data-filter="Security-Privacy">Security & Privacy</div>
            <div class="option" data-filter="Support-Assistance">Support & Assistance</div>
            <div class="option" data-filter="Tool-Features">Tool Features & Usage</div>
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
    document.addEventListener('DOMContentLoaded', function() {
        const options = document.querySelectorAll('.option');
        const faqItems = document.querySelectorAll('.accordion-item');

        options.forEach(option => {
            option.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter').toLowerCase();
                options.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');

                faqItems.forEach(item => {
                    const category = item.getAttribute('data-category').toLowerCase();
                    item.style.display = (filter === 'all' || category === filter) ? 'block' : 'none';
                });
            });
        });
    });

    function filterFaqs() {
        const searchInput = document.getElementById('faq-search').value.toLowerCase();
        const faqItems = document.querySelectorAll('.accordion-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.accordion-button').textContent.toLowerCase();
            const answer = item.querySelector('.accordion-body').textContent.toLowerCase();
            
            if (question.includes(searchInput) || answer.includes(searchInput)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>
@endsection
