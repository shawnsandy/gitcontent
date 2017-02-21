@extends("gitcontent::layouts.layout")

@section('title', 'Collections')
@section('page_title', 'Collections')

@section('content')

    <div class="container">
        <div class="paginate">
            @include('gitcontent::partials.collections-navigation')
        </div>
        <div class="row">

                @each('gitcontent::gcollections.partials.collections', $data, 'collection')

        </div>
    </div>

@endsection
