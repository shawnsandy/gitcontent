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
        @include('gitcontent::component.ace')
    </div>
</div>
