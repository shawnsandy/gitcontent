@extends("gitcontent::layouts.layout")

@section('title', 'Collections')

@section('navigate')
    @include('gitcontent::gcollections.partials.collections-navigation')
@endsection

@section('content')


    <div class="container">

        <div class="row">
            @each('gitcontent::gcollections.partials.collections', $data, 'collection')
        </div>
    </div>

@endsection
