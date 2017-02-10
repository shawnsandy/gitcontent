<div class="code-editor" data-theme="dawn" data-filename="{{$file['filename'] or 'js'}}" data-readonly="false"
     data-mode="{{ strtolower(isset($file['language'] ) ? $file["language"] : 'md') }}">{{ old('content', (isset($file['content']) ? $file['content'] : '')) }}</div>
<textarea style="display: none" class="form-control" name="files[{{ $file['filename'] or '' }}][content]"
          id="content-{{ $file['filename'] or '' }}" cols="30" rows="10"></textarea>
