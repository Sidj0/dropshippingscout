@extends('layouts.master')

@section('content')
<div class="alert alert-info">Warning This will replace dynamic content, <strong>do this carefully</strong></div>
<div class="px-5">
    <a href="{{ route('admin.pages.backup.index', $page->slug) }}" class="btn btn-link">&lt;&lt; Back to Backups</a>
    <form method="post" action="{{ route('admin.pages.store-html',$page->id) }}">
        @csrf
        <textarea name="content" id="page_content">{!! $content !!}</textarea>
        <div class="m-5 mt-0">
        <button type="submit" class="btn btn-primary btn-lg w-100">
            <span class="display-5">
                <span class="fa fa-save"></span>
                Save</span>
        </button>
        </div>
    </form>
</div>
@endsection


@section('script')
<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<!-- Summernote JS (lite version to avoid Bootstrap conflicts) -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        // Wait for all scripts to load
        setTimeout(function() {
            // Initialize Summernote with lite version (no Bootstrap dependencies)
            $('#page_content').summernote({
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onInit: function() {
                        console.log('Summernote initialized successfully');
                    },
                    onError: function(e) {
                        console.error('Summernote error:', e);
                    }
                }
            });
        }, 100);
    });
</script>
@endsection
