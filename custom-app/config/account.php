<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [
    'user' => env('ADMIN_USER', 'admin'),
    'name' => env('ADMIN_NAME', 'admin'),
    'last_name' => env('ADMIN_LAST_NAME', 'admin'),
    'password' => env('ADMIN_PASSWORD', 'password')
];
