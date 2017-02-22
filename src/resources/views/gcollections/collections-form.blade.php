<hr>
@if(isset($data))
    {{ Form::model($data,  (['url' => "/collections/$data->id", 'method' => 'post'])) }}

    {{ method_field("PUT") }}
@else
    {{ Form::open(['url' => '/collections/save', 'method' => 'post']) }}
@endif

<div>

    <div class="col-md-6">

        <p>

            <label for="title" class="lead">
                What is the name of this Collection
            </label>
            {{ Form::text('title', NULL, ['class' => 'form-control input-lg', 'placeholder' => "What's the name of this collection"]) }}

        </p>

    </div>

    <div class="col-md-6">

        <p>
            <label for="gist_id" class="lead">Please add the </label>
            {{ Form::text('gist_id', NULL, ['class' => 'form-control input-lg', 'placeholder' => 'Add the gist ID or Url']) }}
        </p>

    </div>

</div>


<div class="col-md-12">
    <hr>
    <p>
        <label for="tags" class="lead">Tags</label>
        {{ Form::text('tags', NULL, ['class' => 'form-control input-lg', 'placeholder' => 'Tags coming soon']) }}
    </p>

</div>

<div>
    <p class="text-right">
        <button class="btn btn-success btn-lg">Save Collection</button>
    </p>
</div>


{{ Form::close() }}
