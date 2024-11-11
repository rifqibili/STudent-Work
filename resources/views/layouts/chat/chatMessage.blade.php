<div class="msg-body">
    <ul>
        @foreach ($messages as $message)
         <li class=" {{ $message->receiver_id == $auth_id ? 'sender' : 'repaly' }} ">
            <p> {{$message -> message}}</p>
        </li>   
        @endforeach

    </ul>
</div>