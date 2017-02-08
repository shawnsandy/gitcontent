@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">
        <div class="row">
            @include('gitcontent::component.update')
        </div>

    </div>

@endsection

