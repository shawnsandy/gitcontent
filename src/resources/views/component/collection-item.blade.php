{{-- TODO helper function getDEscriptionOrID() --}}
<h2 class="text-capitalize">
    <img alt="@shawnsandy" height="30" src="{{ $value['owner']['avatar_url'] }}&amp;s=60" width="30">
    <a href="/gist/{{ $value['id'] }}">{{ (!empty($value['description'] )) ? $value['description'] : $value['id'] }}</a>
</h2>

<div class="gist-meta small">
    <hr>
    <p>
        Owner : {{ $value['owner']['login'] }} |
        {{ count($value['files']) }} FILES |
        Comments {{ ($value['comments'] > 0) ? $value['comments'] : 0 }} |
    </p>
    <hr>

</div>
