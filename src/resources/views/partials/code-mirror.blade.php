@push('styles')
<link rel="stylesheet" href="https://unpkg.com/codemirror@5.23.0/lib/codemirror.css">
<link rel="stylesheet" href="https://unpkg.com/codemirror@5.23.0/theme/monokai.css">
@endpush
@push('scripts')
<script src="https://unpkg.com/codemirror@5.23.0/lib/codemirror.js"></script>
<script src="https://unpkg.com/codemirror@5.23.0/mode/javascript/javascript.js"></script>
@endpush
@push('inline_scripts')
<script>
    var editor = document.getElementById('content');
    var edit = CodeMirror.fromTextArea(editor, {
        lineNumbers: true,
        styleActiveLine: true,
        matchBrackets: true,
        theme: 'monokai'
    });
</script>
@endpush
