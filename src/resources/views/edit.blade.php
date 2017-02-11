@extends('gitcontent::layouts.layout')

@section('title', 'Title')

@section('content')

    <div class="container">
        @include("gitcontent::partials.navigation")
        <form action="/gist/{{ $data['id'] }}" method="post" id="gist-content">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
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

            @foreach($data['files'] as $file)
                @include('gitcontent::component.gist-editor',['id' => $data['id']])
            @endforeach
        </form>

        <div class="col-md-12">

            <h3>Add a new file to this Gist</h3>

            <form action="/gist/{{ $data['id'] }}?new-file" method="post" id="gist-content">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @include('gitcontent::partials.add-file-gist')

            </form>

            <hr>

        </div>

        <div class="col-md-12">

            <p class="text-left">
                <button id="save-button" type="submit" class="btn btn-success btn-lg text-capitalize">
                    <span class="lead-">
                        <i class="fa fa-chevron-right"></i> Update {{ str_limit($data['description'], 21)}}
                    </span>
                </button>

                <a href="/delete-gist/{{ $gistId }}" class="btn btn-default btn-lg delete-gist"><i class="fa fa-trash"></i>  Delete</a>
            </p>

        </div>


    </div>

@endsection

@push('inline-styles')


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


    $('.delete-gist').click(function (e) {

        var del_btn  = this ;
        if ($(this).html() != "<i class=\"fa fa-times\"></i> Confirm") {
            console.log(del_btn);
            e.preventDefault();
            $(this).html("<i class=\"fa fa-times\"></i> Confirm");
            setTimeout(function(){
             $(del_btn).html("<i class=\"fa fa-trash-o\"></i> Delete");
            }, 3000);

        }

    });

    $('.delete-file-btn').each(function () {

        var btn = this;
        $(this).click(function(e) {

            if ($(this).text() != 'Confirm') {
                e.preventDefault();
                $(this).html('Confirm');
                setTimeout(function() {
                    console.log(btn);
                    $(btn).html("<i class=\"fa fa-times\"></i>")
                }, 3000)
            }
        });

    });




</script>

@endpush
