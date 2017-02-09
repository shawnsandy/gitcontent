<div class="form-group col-md-12">
    <div id="git-edit" class="git-editor">
        <div class="row">
            <div class="col-md-6">
                <p>
                    <input id="filename" type="text" name="files[{{$data['filename']}}]['filename']" class="form-control"
                           placeholder="File Name (newfile.txt)"
                           value="{{ old('filename', ( isset($data['filename']) ? $data['filename']: '' )) }}">
                </p>
            </div>
        </div>
        <div class="code-editor" data-theme="dawn" data-filename="{{$data['filename'] or ''}}" data-readonly="false"
             data-mode="{{ strtolower(isset($data['language'] ) ? $data["language"] : 'md') }}"> {{ old('content', (isset($data['content']) ? $data['content'] : '// code')) }}</div>
        <textarea style="display: none" class="form-control" name="files[{{ $data['filename'] or '' }}][content]"
                  id="content-{{ $data['filename'] or '' }}" cols="30" rows="10"></textarea>
    </div>
</div>
