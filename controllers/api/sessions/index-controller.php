<?php

$user = $_SESSION['user'] ?? '';

if (!$user) {
    json_response(['Guest']);
}

json_response([
    'user' => [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
    ]
]);