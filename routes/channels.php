<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::routes(['middleware' => ['auth']]);


Broadcast::channel('messanger.{sender}.{receiver}', function ($user, $sender, $receiver) {
    return (int) $user->id === (int) $sender || (int) $user->id === (int) $receiver;
});

Broadcast::channel('chat',function ($user){
    return true;
});