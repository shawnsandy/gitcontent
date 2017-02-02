@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">

               <p class="text-capitalize text-right">
                 <span class="badge"> Your {{ count($gist) }} most recent gist</span>
               </p>

                @each('gitcontent::component.collection-item', $gist, 'value')
            </div>
        </div>

    </div>

@endsection
