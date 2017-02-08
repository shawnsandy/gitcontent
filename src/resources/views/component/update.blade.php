<div class="form-group col-md-12">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control" placeholder="Add a short description" value="{{ old('description', (isset($data['description']) ? $data['description'] : '')) }}">
</div>

<div class="form-group col-md-12">
    <label for="filename">File Name</label>
    <input id="filename" type="text" name="filename" class="form-control" placeholder="File Name (newfile.txt)" value="{{ old('filename', (isset($data['files']['filename']) ? $data['files']['filename']: '')) }}">
</div>

<div class="form-group col-md-12">
    <label for="access">This file is public or private</label>
    <select name="access" id="" class="form-control">
        <option value="{{ old('public', (isset($data['public']) ? $data['public']: '')) }}">
            {{ old('public', (isset($data['public']) ? $data['public']: '')) }}
        </option>
        <option value="public">Public Gist</option>
        <option value="private">Private Private</option>
    </select>
</div>
@foreach($data['files'] as $data)
<div class="form-group col-md-12">
    <div id="git-edit" class="git-editor">
        <div class="code-editor" data-theme="dawn" data-readonly="true" data-mode="{{ strtolower($data['language']) }}">{{ old('content', (isset($data['content']) ? $data['content']: '// code')) }}</div>
        <textarea style="display: none" name="content" id="content" cols="30" rows="10"></textarea>
    </div>
</div>

@endforeach

<div class="col-md-12">
    <button id="save-button" type="button" class="btn btn-primary btn-lg"> Save Gist</button>
    <button id="reset-button" type="button" class="btn btn-default btn-lg">Reset</button>
</div>
@push('styles')

@endpush
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

    var exts = {
        html: "html",
        js: "javascript",
        php: "php",
        md: "markdown",
        txt: "text",
        xml: "xml",
        sql: "sql",
        svg: "svg"
    };
 console.log('something...');


    var editor;

    $(".code-editor").each(function(){

        console.log(this);
        var theme = $(this).data('theme');
        var mode = $(this).data('mode');
        var readonly = $(this).data('readonly');
        editor = ace.edit(this);
        editor.setTheme("ace/theme/"+theme);
        editor.setReadOnly(readonly);
        editor.getSession().setMode("ace/mode/"+mode);
        editor.getSession().setUseWrapMode(true);
        editor.setAutoScrollEditorIntoView(true);
        editor.setOption("maxLines", 40);
        editor.setOption("minLines", 5);

    });


    var saveBtn = document.getElementById("save-button");
    var resetBtn = document.getElementById("reset-button");
    var content = document.getElementById('content');

    console.log(content);
    saveBtn.addEventListener("click", function (e) {
        if (editor.getValue()) {
            content.value = editor.getValue();
//            alert(editor.getValue());
            console.log(content.value);
            document.getElementById('gist-content').submit();

        }
    });

    resetBtn.addEventListener("click", function () {
        editor.setValue("", -1);
    });

    //file name
    var filename = document.getElementById('filename');
    filename.addEventListener('change', function () {
        var val = filename.value.split('.');
        var ext = val[val.length - 1];
        console.log(ext.toLowerCase());
        var mode = exts[ext.toLowerCase()];
        console.log(mode);
        editor.getSession().setMode("ace/mode/" + mode);
    });

</script>
@endpush


