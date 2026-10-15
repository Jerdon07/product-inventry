<?php

use Request\RegistrationRequest;
use util\App;
use util\Auth;
use util\Database;

header('Content-Type: application/json');

/* Instantiate the request data */
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$request = new RegistrationRequest;

/* Input Validation */
if (! $request->validate($name, $email, $password)) {
    json_response(['errors' => $request->errors()], 422);
}

$db = App::resolve(Database::class);

/* Duplication Check */
$existing_user = $db->query(
    "SELECT * FROM users WHERE email = :email", [
        ':email' => $email,
    ]
)->find();

if ($existing_user) {
    $request->error('email', 'An account with this email already exists.');
    
    json_response(['errors' => $request->errors()], 409);
}

/* Database Insertion */
$db->query("INSERT INTO users(name, email, password) VALUES (:name, :email, :password)", [
    ':name' => $name,
    ':email' => $email,
    ':password' => password_hash($password, PASSWORD_BCRYPT),
]);

/* Session Creation */
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    ":email" => $email
])->findOrFail();

$auth = new Auth;

$auth->login($user);

json_response(['redirect' => '/']);