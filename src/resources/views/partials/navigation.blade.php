<div class="col-md-12 text-right">
    <p>

        <a href="/gist/create" class="btn btn-default">New</a>
        @if(isset($gistId))
            @if(Route::currentRouteName() == 'gist.edit')

                <a href="/delete-gist/{{ $gistId }}" class="btn btn-danger delete-btn hide">Confirm Delete</a>
                <button href="" class="btn btn-warning delete-gist">Delete</button>
            @else
                <a href="/gist/{{ $gistId }}/edit" class="btn btn-default">Edit</a>
            @endif
        @endif
        <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
    </p>
</div>

@push('inline_scripts')
<script>
    $('.delete-gist').click(function (e) {
        e.preventDefault();
//        $(this).text('Cancel');
       if($(this).text() == "Delete") {
           $(this).text("Cancel") ;
       } else {
           $(this).text('Delete')
       }
       $('.delete-btn').toggleClass('hide');
    })
</script>
@endpush
