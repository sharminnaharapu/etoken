<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/* Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
return (int) $user->id === (int) $id;
}); */

Broadcast::channel('event', function (User $user) {
    return true;
});

Broadcast::channel('doctorTokenCall', function () {
    return true;
});

Broadcast::channel('counterTokenCall', function () {
    return true;
});

Broadcast::channel('TokenGenerate', function () {
    return true;
});
Broadcast::channel('doctorTokenGenerate', function () {
    return true;
});

