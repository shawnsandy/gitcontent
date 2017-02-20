@extends("gitcontent::layouts.layout")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include("gitcontent::gcollections.collections-form")
            </div>
        </div>
    </div>
@endsection
