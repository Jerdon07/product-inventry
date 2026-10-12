<?php

use util\Session;

view('session/create.view.php', [
    'data' => Session::get('old'),
    'errors' => Session::get('errors'),
]);