{{-- TODO helper function getDEscriptionOrID() --}}
<div class="panel panel-default">
    <div class="panel-body">

        <h2 class="text-capitalize">
            <img alt="@shawnsandy" height="30" src="{{ $gist['owner']['avatar_url'] }}&amp;s=60" width="30">
            <a href="/gist/{{ $gist['id'] }}">
                {{ (!empty($gist['description'] )) ? $gist['description'] : $gist['id'] }}
            </a>
        </h2>

        <div class="gist-meta">
            <hr>
            <p>
                <i class="fa fa-user"></i> {{ $gist['owner']['login'] }}
                <i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($gist['updated_at'])->diffForHumans() }}
                <i class="fa fa-file-text"></i>  {{ count($gist['files']) }}
                <i class="fa fa-comments"></i>  {{ ($gist['comments'] > 0) ? $gist['comments'] : 0 }}
            </p>
        </div>

    </div>
</div>
