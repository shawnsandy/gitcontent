<div class="gist-collection">

    <h1>{{ $data['description'] }}</h1>

    @foreach($data['files'] as $key => $value)
        <h3>Filename - {{ $key }}</h3>
        <hr>
        <pre style="max-height: 400px; overflow: auto"><code>{{ $value['content'] }}</code></pre>
    @endforeach
    <hr>
    Author:
    <hr>
</div>

