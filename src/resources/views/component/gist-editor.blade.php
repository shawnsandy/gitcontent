<div class="form-group col-md-12">
    <div id="git-edit" class="git-editor">
        <div class="row">
            <div class="col-md-6">
                <p>
                    <input id="filename" type="text" name="files[{{$file['filename']}}]['filename']"
                           class="form-control input-sm" placeholder="File Name (newfile.txt)"
                           value="{{ old('filename', ( isset($file['filename']) ? $file['filename']: '' )) }}">
                </p>
            </div>
            <div class="col-md-6 text-right">
                <p>
                    <a href="/delete-file/{{ $id }}?deletefile={{ $file['filename'] }}" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
                </p>
            </div>
        </div>
        @include('gitcontent::component.ace')
    </div>
</div>
