<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
