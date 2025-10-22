
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
            <p>
                At Tsscout, your satisfaction is our priority. You may request a full refund within 14 days of your initial subscription payment by contacting us at <a href="mailto:support-team@tsscout.com">support-team@tsscout.com</a>. After 14 days, payments are non-refundable, but you can cancel anytime to stop future billing. Refunds apply only to the initial subscription and do not cover subsequent billing cycles. <br /> <br />

For questions about billing or refunds, please reach out:
<a href="mailto:support-team@tsscout.com">support-team@tsscout.com</a>
            </p>
        </div>
    </div>


</div>
@endsection
