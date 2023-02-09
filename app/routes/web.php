<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $redis = Redis::connection();

    try {
        $redis->set('test_key', 'test_value');
        $value = $redis->get('test_key');
        if ($value === 'test_value') {
            echo 'Redis connection successful!';
        } else {
            echo 'Redis connection failed: Unexpected value retrieved';
        }
    } catch (Exception $e) {
        echo 'Redis connection failed: ' . $e->getMessage();
    }

    dd('teste');
    return view('welcome');
});
