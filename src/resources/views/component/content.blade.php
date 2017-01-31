<div class="gist-collection">

    <h1>{{ $data['description'] }}</h1>

    @foreach($data['files'] as $key => $value)
        <h3>Filename - {{ $key }}</h3>
        <hr>
        <pre>
            <code>
                {{ $value['content'] }}
            </code>
        </pre>
    @endforeach

</div>

