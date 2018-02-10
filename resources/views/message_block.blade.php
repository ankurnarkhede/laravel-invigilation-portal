

@if(count($errors)>0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('msg'))
    <div>
        <p>
            {{ Session::get('msg') }}

        </p>
    </div>
@endif

@if(Session::has('result'))
    <div>
        <p>

            {{ Session::get('result') }}
        </p>
    </div>
@endif