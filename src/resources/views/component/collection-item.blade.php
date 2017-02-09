{{-- TODO helper function getDEscriptionOrID() --}}
<div class="panel panel-default">
    <div class="panel-body">

        <h3 class="text-capitalize">
            @if(isset($gist['ownerAvatar']))
            <img alt="@shawnsandy" height="25px" src="{{ $gist['ownerAvatar'] or null }}&amp;s=60" width="25">
            @endif
            <a href="/gist/{{ $gist['id'] }}">
                {{ (!empty($gist['description'] )) ? $gist['description'] : $gist['id'] }}
            </a>
        </h3>

        <div class="gist-meta">
            <hr>
            <p>
                <i class="fa fa-user"></i> {{ $gist['ownerLogin'] }}
                <i class="fa fa-clock-o"></i> {{ $gist['created'] }}
                <i class="fa fa-file-text"></i>  {{ count($gist['files']) }}
                <i class="fa fa-comments"></i>  {{ ($gist['comments'] > 0) ? $gist['comments'] : 0 }}
            </p>
        </div>

    </div>
</div>
