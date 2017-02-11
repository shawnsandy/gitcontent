

<h4>
    <i class="fa fa-file-text"></i> <a href="{{ $item['raw_url'] }}" target="_blank">{{ $item['filename'] }} </a>
    <span class="badge">{{ round($item['size'] / 1000 , 1 )}} KB</span>
</h4>

<div class="form-group col-md-12">
    <div id="git-edit" class="git-editor">
        <div name="editor" id="editor"
             class="form-control">{{ old('content', (isset($data['files']['content'])) ? $data['files']['content'] : '') }}</div>
        <textarea style="display: none" name="content" id="content" cols="30" rows="10"></textarea>
    </div>
</div>
<hr>
