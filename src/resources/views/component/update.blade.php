<div class="form-group col-md-12">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control" placeholder="Add a short description"
           value="{{ old('description', (isset($data['description']) ? $data['description'] : '')) }}">
</div>

<div class="form-group col-md-12">
    <label for="public">This file is public or private</label>
    <select name="public" id="" class="form-control">
        <option value="{{ old('public', ($data['public'] == 1) ? true : false ) }}">
            {{ old('public', ($data['public'] == 1) ? 'public' : 'private') }}
        </option>
        <option value="public">Public Gist</option>
        <option value="private">Private Private</option>
    </select>
</div>

@each('gitcontent::component.ace-editor', $data['files'], 'data')



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

    var saveBtn = document.getElementById("save-button");
    var resetBtn = document.getElementById("reset-button");

    $(".code-editor").each(function () {
        var editor;

        var theme = $(this).data('theme');
        var mode = $(this).data('mode');
        var readonly = $(this).data('readonly');
        var filename = $(this).data('filename') ? $(this).data('filename') : 'new';
        var content = document.getElementById('content-' + filename);

        console.log(content);
        editor = ace.edit(this);
        editor.setTheme('ace/theme/' + theme);
        editor.setReadOnly(readonly);
        editor.getSession().setMode("ace/mode/" + mode);
        editor.getSession().setUseWrapMode(true);
        editor.setAutoScrollEditorIntoView(true);
        editor.setOption('maxLines', 40);
        editor.setOption('minLines', 5);
        content.value = editor.getValue();

        editor.on('blur', function () {
            content.value = editor.getValue();
            console.log(editor.getValue());

        });

    });

    saveBtn.addEventListener("click", function (e) {
        console.log('saved');
        document.getElementById('gist-content').submit();

    });

</script>
@endpush
