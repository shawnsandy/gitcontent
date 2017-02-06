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

