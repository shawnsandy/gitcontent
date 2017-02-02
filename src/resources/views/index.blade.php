@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">

               <p class="text-capitalize text-right">Your {{ count($data) }} most recent gist</p>

                @each('gitcontent::component.collection-item', $data, 'value')
            </div>
        </div>

    </div>

@endsection
