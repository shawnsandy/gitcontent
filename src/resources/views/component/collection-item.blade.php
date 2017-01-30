@foreach($data as $item => $value )

    {{-- TODO helper function getDEscriptionOrID() --}}
    <h1>{{ (!empty($value['description'] )) ? $value['description'] : $value['id'] }}</h1>


    <div class="meta-data">

        <hr>
        details
        <hr>

    </div>

@endforeach
