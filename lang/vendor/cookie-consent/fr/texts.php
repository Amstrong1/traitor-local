<?php

if (request()->routeIs('home.*')) {
    return [
        'message' => "Autoriser l'aplication à accéder au stockage.",
        'agree' => 'Autoriser',
    ];
} else {
    return [
        'message' => "Ce site nécessite l'autorisation de cookies pour fonctionner correctement.",
        'agree' => 'Accepter',
    ];
}

