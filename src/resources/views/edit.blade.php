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

            <h3>Add a new file to this Gist</h3>
            <form action="/gist/{{ $data['id'] }}?new-file" method="post" id="gist-content">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <p class="input-group">
                    <span class="input-group-addon" id=""><i class="fa fa-file-text"></i> </span>
                    <input type="text" class="form-control input-lg" name="files"
                           placeholder="Enter the filename (readme.md) and click save">
                    <span class="input-group-addon text-uppercase" id="">
                      <button type="submit" class="btn btn-default btn-sm btn-link ">
                        <span class="h5"><i class="fa fa-plus"></i> Attach New File</span>
                      </button>
                    </span>
                </p>

            </form>
            <hr>

        </div>

        <div class="col-md-12">

            <p class="text-right">
                <button id="save-button" type="submit" class="btn btn-success text-capitalize">
                   <span class="lead"><i class="fa fa-chevron-right"></i> Update {{ $data['description'] }}</span>
                </button>
            </p>

        </div>


    </div>

@endsection

