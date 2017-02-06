<div class="col-md-6">
    <p>
        @if($pagination['currentPage'] >= 2)
            <a href="/gist?page={{ $pagination['previousPage'] }}" class="btn btn-default">Previous Page</a>
        @endif
    </p>

</div>
<div class="col-md-6">
    <p class="pull-right">
        @if(!$pagination['lastPage'])
            <a href="/gist?page={{ $pagination['nextPage'] }}" class="btn btn-default">Next Page</a>
        @endif
    </p>
</div>



