<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-12 gc-title">
                <p class="h4"><a href="/gist/{{ $collection->gist_id }}">{{ $collection->title }}</a></p>
                <hr>
            </div>
            <div class=" col-md-12 small text-right">
                {{ $collection->updated_at->diffForHumans() }}
                <a class="btn btn-xs btn-default" href="/collections/{{ $collection->id }}/edit">Edit</a></div>
        </div>
    </div>
</div>
