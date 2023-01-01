<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Room;
use App\Models\Faculty;
use App\Models\StudentParent;

use Illuminate\Http\Request;
use App\Http\Requests\ErrorsRequest;
use Illuminate\Support\Facades\Hash;

class StudentActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $active = Student::all();
        return view('admin.student.active.index', compact(
            'active'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.student.active.create', [
            'rooms' => Room::all(),
            'faculties' => Faculty::all()
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ErrorsRequest $request)
    {
        //

        //return $request->file('image')->move('tinydash/img/', store('image'));

        
        $parent = new StudentParent;
        $parent->parent_name = $request->parentname;
        $parent->phone = $request->parentphone;
        $parent->address = $request->parentaddress;
        $parent->city = $request->parentcity;

        $parent->save();

        $student = new Student;
        $student->nim = $request->nim;
        $student->full_name = $request->fullname;
        $student->gender = $request->gender;
        $student->room_id = $request->room;
        $student->faculty_id = $request->faculty;
        //$student->img_student = $request->image;
        $student->parent_id = $parent->id;
        $student->password = Hash::make($request['nim']);
        $student->phone = $request->phone;
        
        //Menambahkan File foto lalu pindahkan ke dalam file img
        $d = $request->image;
        $data = $request->nim.'.'.$d->getClientOriginalExtension();
        $student-> img_student = $data;
        $d-> move(public_path().'/img', $data);
        
        $student->save();

        

        return redirect('admin/student/active')->with('success', "Data berhasil Disimpan");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //
        $data = Student::where('nim',$nim)->first();
        return view('admin.student.active.detail', compact(
            'data'
        ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function reset($nim)
    {
        $reset = Student::select('password')->where('nim',$nim)->first();
        Student::where('nim',$nim)->update(['password'=>Hash::make($nim)]);

        return redirect()->back()->with('success', "Password $nim berhasil di Reset");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
