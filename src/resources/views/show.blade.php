@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                @include('gitcontent::component.content')
            </div>

        </div>

    </div>
    @push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
    @endpush
    @push('scripts')

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
    @endpush
    @push('inline_scripts')
    <script>
        $(document).ready(function() {
            $('pre code').each(function(i, block) {
                hljs.highlightBlock(block);
            });
        });
    </script>
    @endpush
@endsection
