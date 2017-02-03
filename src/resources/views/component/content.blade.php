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
        <pre style="" class="prettyprint linenums lang-{{ strtolower($item['language']) }}">
            {{ $item['content'] }}
        </pre>

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


    @push('styles')

    @endpush
    @push('scripts')
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=sons-of-obsidian"></script>
    @endpush
    @push('inline_scripts')
    @endpush

</div>

