@extends('gitcontent::layouts.layout')

@section('title', 'Collections')
@section('page_title', 'Collections')

@section('content')

<div class="container">
    <div class="navigate">
        @include('gitcontent::partials.navigation')
    </div>
    <div class="row">
        <div class="col-md-8">
            @include('gitcontent::gcollections.collections-form')
        </div>
    </div>
</div>

@endsection