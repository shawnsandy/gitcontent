@extends('gitcontent::layouts.layout')

@section('title', 'Collections')

@section('navigate')
    @include('gitcontent::gcollections.partials.collections-navigation')
@endsection

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            @include('gitcontent::gcollections.collections-form')
        </div>
    </div>

</div>

@endsection
