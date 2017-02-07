<h4>
    <i class="fa fa-file-text"></i> <a href="{{ $item['raw_url'] }}" target="_blank">{{ $item['filename'] }} </a>
    <span class="badge">{{ round($item['size'] / 1000 , 1 )}} KB</span>
</h4>

<div id="git-edit" class="gist-editor">
    <div id="code-highlights" style="" class="code-highlights" data-theme="dawn" data-readonly="true"
         data-mode="{{ strtolower($item['language']) }}">{{ $item['content'] }}</div>
</div>
<hr>

