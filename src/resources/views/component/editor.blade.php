<div class="form-group col-md-12">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="filename">File Name</label>
    <input type="text" name="filename" class="form-control">
</div>

<div class="form-group col-md-6">
    <label for="access">Public</label>
    <select name="access" id="" class="form-control">
        <option value="public">Public</option>
        <option value="private">Private</option>
    </select>
</div>

<div class="form-group col-md-12">
    <div id="git-edit" class="git-editor">
        <h4>Code Snippet</h4>
        <div name="editor" id="editor" class="form-control"></div>
        <textarea style="display: none" name="content" id="content" cols="30" rows="10"></textarea>
    </div>
</div>

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

    var config = document.getElementById('git-edit');
    var theme = config.dataset.theme ;

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/dawn");
    editor.getSession().setMode("ace/mode/javascript");
    editor.getSession().setUseWrapMode(true);
    editor.setAutoScrollEditorIntoView(true);

    editor.setOption("maxLines", 30);
    editor.setOption("minLines", 20);

    var saveBtn = document.getElementById("save-button");
    var resetBtn = document.getElementById("reset-button");
    var content = document.getElementById('content');
    console.log(content);
    saveBtn.addEventListener("click", function(e){



    });

    resetBtn.addEventListener("click", function(){
        editor.setValue("", -1);
    });

</script>
@endpush
