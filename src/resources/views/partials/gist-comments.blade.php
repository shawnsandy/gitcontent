<h4 class="lead">
    <img alt="@{{ $comment['userLogin']  }}" height="30"
         src="{{ $comment['userAvatar'] }}&amp;s=30" width="30">

    {{ $comment['userLogin'] }} <i class="fa fa-clock-o"> {{ $comment['created'] }}</i>


</h4>
<hr>
<p>
    {{ $comment['body'] }}
</p>
