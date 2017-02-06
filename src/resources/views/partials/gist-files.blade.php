<h4>
    <i class="fa fa-file-text"></i> <a href="{{ $item['raw_url'] }}" target="_blank">{{ $item['filename'] }} </a>
    <span class="badge">{{ round($item['size'] / 1000 , 1 )}} KB</span>
</h4>

<div id="git-edit" class="gist-editor">
    <div id="code" style="" class="code" data-theme="dawn" data-lang="{{ strtolower($item['language']) }}" >
        {{ $item['content'] }}
    </div>
</div>


@push('inline-styles')
<style type="text/css" media="screen">
    #editor {
        /*position: absolute;*/
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js"></script>
@endpush
@push('inline_scripts')
<script>
  var editor;
  var theme;
  var mode;

  $('.code').each(function(){
        //var config = document.getElementById('git-edit');
        theme = $(this).data('theme');
        mode = $(this).data('mode');

        console.log(mode + theme);

        editor = ace.edit(this);
        editor.setTheme("ace/theme/" + theme);
        editor.getSession().setMode("ace/mode/" + mode);
        editor.getSession().setUseWrapMode(true);
        editor.setAutoScrollEditorIntoView(true);
        editor.setOption("maxLines", 30);
        editor.setOption("minLines", 10);
        editor.setReadOnly(true);
    })


</script>
@endpush
