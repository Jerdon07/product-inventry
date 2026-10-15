<?php

use Request\LoginRequest;
use util\Auth;

header('Content-Type: application/json');

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$request = new LoginRequest;

/* Validate the request */
if (! $request->validate($email, $password)) {
    json_response(['errors' => $request->errors()], 422);
}

/* Authenticate the user */
if ((new Auth)->handle($email, $password)) {
    json_response(['redirect' => '/']);
}

json_response([
    'errors' => ['email' => 'No matching account for that email address and password.'],
], 422);