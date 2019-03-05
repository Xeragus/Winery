<?php

namespace App\Http\Controllers;

class WinesIndexController extends Controller
{
    public function index()
    {
        return view('wines.index');
    }
}