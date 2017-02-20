@if(isset($data))
    {{ Form::model($data,  (['url' => "/collections/$data->id", 'method' => 'post'])) }}

    {{ method_field("PUT") }}
@else
    {{ Form::open(['url' => '/collections/', 'method' => 'post']) }}
@endif

<p>
    <label for="gist_id">Gist ID or url</label>
    {{ Form::text('gist_id', NULL, ['class' => 'form-control input-lg', 'placeholder' => 'Add the gist ID or Url']) }}
</p>

<p>
    <label for="title">Title</label>
    {{ Form::text('title', null, ['class' => 'form-control input-lg', 'placeholder' => "What's the name of this collection"]) }}
</p>

<p>
    <label for="tags">Tags</label>
    {{ Form::text('tags', NULL, ['class' => 'form-control input-lg', 'placeholder' => 'Tags coming soon']) }}
</p>

<p class="text-right">
    <button class="btn btn-success btn-lg">Save Collection</button>
</p>

{{ Form::close() }}
