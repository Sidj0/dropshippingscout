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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        // BS custom file input
        bsCustomFileInput.init();

        // Initialize Summernote for English content
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
            language: 'en-US'
        });

    });
</script>
@endsection
