<div class="code-editor" data-theme="dawn" data-filename="{{$data['filename'] or 'js'}}" data-readonly="false"
     data-mode="{{ strtolower(isset($data['language'] ) ? $data["language"] : 'md') }}">{{ old('content', (isset($data['content']) ? $data['content'] : '')) }}</div>
<textarea style="display: none" class="form-control" name="files[{{ $data['filename'] or '' }}][content]"
          id="content-{{ $data['filename'] or '' }}" cols="30" rows="10"></textarea>
