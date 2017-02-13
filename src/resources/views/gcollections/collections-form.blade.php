{{ Form::open(['url' => 'collections/', 'method' => 'post']) }}
<p>
    <label for="title">Title</label>
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</p>

<p>
    <label for="gist_id">Gist It</label>
    {{ Form::text('gist_id', NULL, ['class' => 'form-control']) }}
</p>

<p>
    <label for="">Description</label>
    {{ Form::textarea('description', NULL, ['class' => 'form-control']) }}
</p>

<p>
    <label for="tags">Tags</label>
    {{ Form::text('tags', NULL, ['class' => 'form-control']) }}
</p>

<p>
    <button class="btn btn-success">Add Gist</button>
</p>

{{ Form::close() }}
