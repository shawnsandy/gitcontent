@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">
        @include('gitcontent::component.collection-item')
    </div>

@endsection