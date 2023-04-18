<?php

namespace App\Http\Controllers\Redis;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index()
    {
        Redis::set('user:1:first_name','Mike');
        Redis::set('user:2:first_name','John');

        dd(Redis::get('user:1:first_name'));
    }
}
