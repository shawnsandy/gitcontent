@php
use Carbon\Carbon ;
@endphp
<div class="gist-collection">

    <h3 class="text-capitalize">
        <img alt="@{{ $data['owner']['login']  }}" height="30" src="{{ $data['owner']['avatar_url'] }}&amp;s=30" width="30">
        <a href="/">
            {{ (!empty($data['description'] )) ? $data['description'] : $data['id'] }}
        </a>
    </h3>
    <hr>
    @foreach($data['files'] as $key => $value)
        <h4>
            <a href="{{ $value['raw_url'] }}" target="_blank">{{ $key }}</a> <span class="badge">{{ $value['size'] / 1000 }} KB</span>
        </h4>
        <pre style="" class="prettyprint linenums lang-php">
            {{ $value['content'] }}
        </pre>
    @endforeach

    Posted {{ Carbon::parse($data['created_at'])->diffForHumans() }} by  {{ ucwords($data['owner']['login'] )}} Updated {{ Carbon::parse($data['updated_at'])->diffForHumans() }}
    <hr>
    @push('styles')

    @endpush
    @push('scripts')
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=sons-of-obsidian"></script>
    @endpush
    @push('inline_scripts')
    @endpush

</div>

