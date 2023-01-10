<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index', [
            'title' => 'Admin'
        ]);
    }

    // public function show($id)
    // {
    //     //
    //     $data = Admin::where('id',$id)->first();
    //     return view('super.profile', compact(
    //         'data'
    //     ));

    // }

    public function dashboard()
    {
        
        return view('admin.index', [
            'title' => 'Admin'
        ]);
    }
}
