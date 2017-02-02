@php
use Carbon\Carbon ;
@endphp
<div class="gist-collection">

    <h3 class="text-capitalize">
        <img alt="@{{ $data['owner']['login']  }}" height="30" src="{{ $gist['ownerAvatar'] }}&amp;s=30" width="30">
        <a href="/">
            {{ (!empty($gist['description'] )) ? $gist['description'] : $gist['id'] }}
        </a>
    </h3>
    <hr>

    @foreach($gist['files'] as $key => $item)

        <h4>
            <a href="{{ $item['raw_url'] }}" target="_blank">{{ $key }}</a> <span class="badge">{{ $item['size'] / 1000 }} KB</span>
        </h4>
        <pre style="" class="prettyprint linenums lang-{{ strtolower($item['language']) }}">
            {{ $item['content'] }}
        </pre>

    @endforeach

    <i class="fa fa-clock-o"></i> {{ $gist['created'] }} <i class="fa fa-user"></i> {{ $gist['ownerLogin'] }}   <i class="fa fa-pencil"></i>  {{ $gist['updated'] }}
    <hr>
    @push('styles')

    @endpush
    @push('scripts')
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=sons-of-obsidian"></script>
    @endpush
    @push('inline_scripts')
    @endpush

</div>

