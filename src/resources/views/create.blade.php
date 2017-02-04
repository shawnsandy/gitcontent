@extends('gitcontent::layouts.layout')

@section('title', 'Create  new gist')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <h3>Create Gist Snippet</h3>
                <hr>
            </div>

            <form action="/gist" method="post" id="gist-content">
                {{ csrf_field() }}
                @include('gitcontent::component.editor')
            </form>

        </div>

    </div>

@endsection()
