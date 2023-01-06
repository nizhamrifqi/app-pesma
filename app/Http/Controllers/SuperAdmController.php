<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdmController extends Controller
{
    public function index()
    {
        return view('super.index', [
            'title' => 'Super Admin'
        ]);
    }

}