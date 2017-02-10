@extends('gitcontent::layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Hello</h1>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi culpa id iusto molestiae nisi obcaecati
                    quaerat
                    quasi, reprehenderit soluta voluptatum?
                </p>
                <form action="/form" method="post">
                    {{ csrf_field() }}
                    <textarea id="editor" name="editor">function foo(items) {
                    var x = "All this is syntax highlighted";
                    return x;
                    }</textarea>

                    <button class="btn btn-submit">
                        SAVE
                    </button>
                </form>

            </div>
            <hr>
        </div>
    </div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js"></script>
@endpush

@push('inline_scripts')
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/javascript");
    editor.setOption('maxLines', 40);
    editor.setOption('minLines', 10);
</script>
@endpush
