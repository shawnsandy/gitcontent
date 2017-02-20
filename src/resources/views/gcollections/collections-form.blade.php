@if(isset($data))
{{ Form::model($data,  (['url' => "collections/{ $data->id }", 'method' => 'post'])) }}
    {{ method_field("PUT") }}
@else
{{ Form::open(['url' => 'collections/', 'method' => 'post']) }}
@endif

<p>
    <label for="title">Title</label>
    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => "What's the name of this collection"]) }}
</p>

<p>
    <label for="gist_id">Gist ID or url</label>
    {{ Form::text('gist_id', NULL, ['class' => 'form-control', 'placeholder' => 'Add the gist ID or Url']) }}
</p>

<p>
    <label for="tags">Tags</label>
    {{ Form::text('tags', NULL, ['class' => 'form-control', 'placeholder' => 'Tags coming soon']) }}
</p>

<p>
    <button class="btn btn-success btn-block">Add Gist</button>
</p>

{{ Form::close() }}
