@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">

        <div class="row">

            <div class="paginate">
                @include('gitcontent::partials.navigation')
            </div>

            <div class="col-md-12">
                @each('gitcontent::component.collection-item', $data, 'gist')
            </div>

            <div class="paginate">
                @include('gitcontent::partials.pagination')
            </div>

            <hr>

        </div>

    </div>

@endsection
