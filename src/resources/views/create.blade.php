@extends('gitcontent::layouts.layout')

@section('title', 'Create  new gist')

@section('content')

    <div class="container">

        <div class="col-md-12">

            <form action="/gist" method="post">
                {{ csrf_field() }}
                @include('gitcontent::component.editor')
            </form>

        </div>

    </div>

@endsection()
