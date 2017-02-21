
    <p class="text-right">


        <a href="/collections/create" class="btn btn-default">New</a>
        @if(isset($gistId))
            @if(Route::currentRouteName() == 'gist.edit')

            @else
                <a href="/collections/{{ $gistId }}/edit" class="btn btn-default">Edit</a>
            @endif
        @endif
        <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>

    </p>


