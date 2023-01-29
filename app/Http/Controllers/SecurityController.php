<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    
    public function index()
    {
        return view('security.index', [
            'title' => 'Security'
        ]);
    }
    public function detail($id)
    {
        // Method untuk menampilkan detail dari student
        $data = Student::where('id',$id)->first();
        return view('student.data.index', compact('data'),[
            'title' => 'Student',
            'rooms' => Room::select('id','name_room')->orderBy('name_room', 'asc')->get(),
            'faculties' => Faculty::select('id','name_faculty')->orderBy('name_faculty', 'asc')->get(),
        ]);
    }

}
