<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    protected $user;

    public function __construct()
    {

    }

    public function index()
    {
        return view('setting.index');
    }
}
