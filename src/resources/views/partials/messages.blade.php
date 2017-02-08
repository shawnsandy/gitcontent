@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <p class="alert alert-danger">{{ Session::get('success') }}</p>
@endif

@if(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

@if(Session::has('warning'))
    <p class="alert alert-warning">{{ Session::get('warning') }}</p>
@endif

@if(Session::has('info'))
    <p class="alert alert-info">{{ Session::get('info') }}</p>
@endif

