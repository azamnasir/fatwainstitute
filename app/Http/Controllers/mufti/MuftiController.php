<?php

namespace App\Http\Controllers\mufti;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MuftiController extends Controller
{
    public function index ()
    {
        return view('mufti.home');
    }
}
