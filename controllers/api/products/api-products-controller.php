<?php

use util\App;
use util\Database;

$db = App::resolve(Database::class);

$products = $db->query("SELECT * FROM products WHERE user_id = :user_id", [
    ":user_id" => $_SESSION['user']['id']
])->get();

json_response(['products' => $products], 201);