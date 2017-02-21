@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section("navigate")
    @include('gitcontent::partials.navigation')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('gitcontent::component.content')
            </div>
        </div>
    </div>

@endsection
