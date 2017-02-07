@php

@endphp
<div class="gist-collection">

    <h3 class="text-capitalize">
        <img alt="{{ '@'.$gist['ownerLogin'] }}" height="30" src="{{ $gist['ownerAvatar'] }}&amp;s=30" width="30">
        <a href="/">
            {{ (!empty($gist['description'] )) ? $gist['description'] : $gist['id'] }}
        </a>
    </h3>
    <hr>

    @each('gitcontent::partials.gist-files', $gist['files'], 'item')

    <p>
        <i class="fa fa-clock-o"></i> {{ $gist['created'] }} <i class="fa fa-user"></i> {{ $gist['ownerLogin'] }} <i
                class="fa fa-pencil"></i> {{ $gist['updated'] }}
    </p>

    <hr>


    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <h3><i class="fa fa-comments"></i> Comments <span class="badge">{{ $gist['comments'] }}</span></h3>

            @if($gist['comments'] != "0")
                <div class="panel panel-default">

                    <div class="panel-body">

                        @each("gitcontent::partials.gist-comments", $comments, 'comment')

                    </div>
                </div>
            @endif

        </div>
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

    $('.code-highlights').each(function () {

        //var config = document.getElementById('git-edit');
        var theme = $(this).data('theme');
        var mode = $(this).data('mode');
        var readonly = $(this).data('readonly');
        var maxLines = $(this).data('maxLines') ? $(this).data('maxLines') : 40;
        var minLines = $(this).data('minLines') ? $(this).data('minLines') : 10;

        editor = ace.edit(this);
        editor.setTheme("ace/theme/" + theme);
        editor.getSession().setMode("ace/mode/" + mode);
        editor.getSession().setUseWrapMode(true);
        editor.setAutoScrollEditorIntoView(true);
        editor.setOption("maxLines", maxLines);
        editor.setOption("minLines", minLines);
        editor.setReadOnly(readonly);

    })
</script>
@endpush
