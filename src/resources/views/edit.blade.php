@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">
        <div class="row">
            @include('gitcontent::component.editor')
            {{ dump($data) }}
        </div>

    </div>

@endsection

