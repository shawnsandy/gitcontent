<div class="col-md-12 text-right">
    <p>
        <a href="/gist/create" class="btn btn-default">New</a>
        @if(isset($gistId))
            <a href="/gist/{{ $gistId }}/edit" class="btn btn-default">Edit</a>
        @endif
        <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
    </p>
</div>
