@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('gitcontent::partials.navigation')
                @include('gitcontent::component.content')
            </div>
        </div>
    </div>

@endsection
