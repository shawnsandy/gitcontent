@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">
        <div class="row">
            @each('gitcontent::component.collection-item', $data, 'value')
        </div>
    </div>

@endsection
