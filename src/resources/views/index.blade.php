@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
               <h3 class="text-capitalize">Your {{ count($data) }} most recent gist</h3>
                <hr>
                @each('gitcontent::component.collection-item', $data, 'value')
            </div>
        </div>

    </div>

@endsection
