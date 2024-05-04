@if ($message = Session::get('success'))

    <div class="alert alert-success alert-dismissible fade show" >
        <div class="alert-body">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p>{{$message}}</p>
        </div>
    </div>

@endif
