@extends('gitcontent::layouts.layout')
@section('title', 'Title')
@section('content')

    <div class="container">
        <h1>{{ $data['description'] }}</h1>
        <hr>
        @foreach($data['files'] as $key => $value)
            <h3>Filename - {{ $key }}</h3>
            <hr>
            <pre>
            <code>
                {{ $value['content'] }}
            </code>
        </pre>
        @endforeach
        {{ dump($data) }}
    </div>

@endsection
