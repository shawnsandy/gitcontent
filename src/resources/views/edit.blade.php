@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">
        <div class="row">


        </div>

        @include("gitcontent::partials.navigation")
        <form action="/gist/{{ $data['id'] }}" method="post" id="gist-content">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @include('gitcontent::component.update')
        </form>

        <div class="col-md-12">

            <form action="/gist/{{ $data['id'] }}?new-file" method="post" id="gist-content">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <p class="input-group">
                    <span class="input-group-addon" id=""><i class="fa fa-file"></i> Add File</span>
                    <input type="text" class="form-control input-lg" name="files"
                           placeholder="Enter the filename (readme.md) and click save">
                    <span class="input-group-addon" id="">
                        <button href="" class="btn btn-link btn-sm">Save New File</button>
                    </span>
                </p>

            </form>
            <hr>

        </div>

        <div class="col-md-12">
            <p>
                <button id="save-button" type="submit" class="btn btn-primary btn-lg btn-block">Save Gist</button>
            </p>
            <hr>
        </div>

    </div>

@endsection

