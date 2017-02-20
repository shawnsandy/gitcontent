<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6 gc-title">
                <p class="h4"><a href="/gist/{{ $collection->gist_id }}">{{ $collection->title }}</a></p>
                {{ $collection->updated_at->diffForHumans() }}
            </div>
            <div class=" col-md-6 small text-right">
                <a class="btn btn-xs btn-default" href="/collections/{{ $collection->id }}/edit">Edit</a></div>
        </div>
    </div>
</div>
