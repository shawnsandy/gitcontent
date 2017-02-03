@php
    use Carbon\Carbon ;
@endphp
<div class="gist-collection">

    <h3 class="text-capitalize">
        <img alt="@{{ $data['owner']['login']  }}" height="30" src="{{ $gist['ownerAvatar'] }}&amp;s=30" width="30">
        <a href="/">
            {{ (!empty($gist['description'] )) ? $gist['description'] : $gist['id'] }}
        </a>
    </h3>
    <hr>

    @foreach($gist['files'] as $key => $item)

        <h4>
            <i class="fa fa-file-text"></i> <a href="{{ $item['raw_url'] }}" target="_blank"> {{ $key }}</a>
            <span class="badge">{{ round($item['size'] / 1000 , 1 )}} KB</span>
        </h4>
    <div id="git-edit" data-theme="monokai" data-lang="{{ strtolower($item['language']) }}" class="gist-editor">
        <div id="code" style="" class="lang-{{ strtolower($item['language']) }}">
            {{ $item['content'] }}
        </div>
    </div>


    @endforeach
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

                 @foreach($comments as $comment)
                     <h4 class="lead">
                         <img alt="@{{ $comment['userLogin']  }}" height="30" src="{{ $comment['userAvatar'] }}&amp;s=30" width="30">

                         {{ $comment['userLogin'] }}    <i class="fa fa-clock-o"> {{ $comment['created'] }}</i>


                     </h4>
                     <hr>
                 <p>
                     {{ $comment['body'] }}
                 </p>

                 @endforeach
             </div>
         </div>
             @endif

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

        var config = document.getElementById('git-edit');
        var theme = config.dataset.theme ;
        var mode = config.dataset.lang ;

        var editor = ace.edit("code");
        editor.setTheme("ace/theme/"+theme);
        editor.getSession().setMode("ace/mode/"+mode);
        editor.getSession().setUseWrapMode(true);
        editor.setAutoScrollEditorIntoView(true);
        editor.setOption("maxLines", 30);
        editor.setOption("minLines", 10);
        editor.setReadOnly(true);

    </script>
    @endpush

</div>

