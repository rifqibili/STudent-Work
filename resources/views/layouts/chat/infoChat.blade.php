<div class="row">
    <div class="col-8">
        <div class="d-flex align-items-center">
            
            <div class="flex-shrink-0">
                <img class=" rounded-circle"
                    src="{{asset ('storage/gambar/user/' . $receiver->foto)}}"
                    alt="user img" width="75px">
            </div>
            <div class="flex-grow-1 ms-3">
                <h3>{{ $receiver->name ?? 'User' }}</h3>
                <p>{{$receiver->role}}</p>
            </div>
        </div>
    </div>
</div>