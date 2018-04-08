

@if(count($errors)>0)

    <div class="row">
        <div class="col s12 m12">
            <div class="card red lighten-2">
                <div class="card-content white-text">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('msg'))
    <div class="row">
        <div class="col s12 m12">
            <div class="card teal lighten-2">
                <div class="card-content white-text">
                    <p>
                        {{ Session::get('msg') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('result'))
    <div class="row">
        <div class="col s12 m12">
            <div class="card teal lighten-2">
                <div class="card-content white-text">
                    <p>
                        {{ Session::get('result') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endif
