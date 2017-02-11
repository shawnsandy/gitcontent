<h4 class="lead">
<img alt="@{{ $comment['userLogin']  }}" height="30" src="{{ $comment['userAvatar'] }}&amp;s=30" width="30">
    {{ $comment['userLogin'] }}
</h4>
<hr>
<p>
    {{ $comment['body'] }}
</p>
<hr>
<p>
    <i class="fa fa-clock-o"></i>{{ $comment['created'] }}
</p>
