
@extends('layouts.master')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('meta_author', $page->meta_author)

@section('og_title', $page->title)
@section('og_description', $page->meta_description)

@section('styles')
<!-- Custom CSS for this view -->
<link href="{{asset('css/privacy-policy.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <div class="content">
            <h5 class="privacy1">Refund Policy</h5>
            <div class="refund-policy-content">
                <p class="refund-main-text">
                    At Tsscout, your satisfaction is our priority. You may request a full refund within <span class="refund-period">14 days</span> of your initial subscription payment by contacting us at <a href="mailto:support-team@tsscout.com" class="refund-email-link">support-team@tsscout.com</a>. After 14 days, payments are non-refundable, but you can cancel anytime to stop future billing. Refunds apply only to the initial subscription and do not cover subsequent billing cycles.
                </p>

                <div class="refund-contact-section">
                    <p class="refund-contact-text">For questions about billing or refunds, please reach out:</p>
                    <a href="mailto:support-team@tsscout.com" class="refund-contact-email">support-team@tsscout.com</a>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
