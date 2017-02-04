<h4>
    <i class="fa fa-file-text"></i> <a href="{{ $item['raw_url'] }}" target="_blank">{{ $item['filename'] }} </a>
    <span class="badge">{{ round($item['size'] / 1000 , 1 )}} KB</span>
</h4>

<div id="git-edit" data-theme="dawn" data-lang="{{ strtolower($item['language']) }}" class="gist-editor">
    <div id="code" style="" class="lang-{{ strtolower($item['language']) }}">
        {{ $item['content'] }}
    </div>
</div>

