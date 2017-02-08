@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">
        <div class="row">
            <form action="/gist/{{ $data['id'] }}" method="post" id="gist-content">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            @include('gitcontent::component.update')
            </form>
        </div>

    </div>

@endsection

