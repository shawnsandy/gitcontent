@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">

               <p class="text-capitalize text-right">
                 <span class="badge"> Your {{ count($data) }} most recent gist</span>
               </p>

                @each('gitcontent::component.collection-item', $data, 'gist')
            </div>
            @include('gitcontent::partials.navigation')
            <hr>
        </div>

    </div>

@endsection
