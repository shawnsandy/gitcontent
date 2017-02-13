@extends("gitcontent::layouts.layout")

@section('title', 'Collections')
@section('page_title', 'Collections')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @each('gitcontent::gcollections.partials.collections', $data, 'collection')
            </div>
        </div>
    </div>

@endsection
