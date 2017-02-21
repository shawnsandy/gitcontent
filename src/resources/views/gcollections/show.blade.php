@extends("gitcontent::layouts.layout")

@section("content")
    <div class="container">
        <div class="paginate">
            @include('gitcontent::gcollections.partials.collections-navigation')
        </div>
        <div class="row">
            <div class="col-md-12">
                <article class="">
                    <h3>
                       {{ $data->collection }}
                    </h3>
                </article>
                {{ dump($data) }}
            </div>
        </div>
    </div>

@endsection
