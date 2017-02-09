@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">
        <div class="row">
            @include("gitcontent::partials.navigation")
            <form action="/gist/{{ $data['id'] }}" method="post" id="gist-content">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @include('gitcontent::component.update')
            </form>

            <div class="row-">

                <div class="col-md-10">

                    <form action="/">

                        <p class="input-group input-group-lg">
                            <span class="input-group-addon" id="">Add new file</span>
                            <input type="text" class="form-control"
                                   placeholder="Enter the filename (readme.md) and click save">
                            <span class="input-group-addon" id="">
                            <button href="" class="btn btn-link btn-xs">Save</button>
                        </span>
                        </p>

                    </form>
                </div>

                <div class="col-md-2">
                    <button id="save-button" type="submit" class="btn btn-primary btn-lg btn-block">Save Gist</button>
                </div>

            </div>
        </div>
    </div>

@endsection

