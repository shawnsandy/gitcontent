<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="gc-title">
                <h4><a href="collections/{{ $collection->id }}/edit">{{ $collection->title }}</a></h4>
            </div>
            <hr>
            <p class="small">{{ $collection->updated_at->diffForHumans() }}</p>
        </div>
    </div>
</div>
