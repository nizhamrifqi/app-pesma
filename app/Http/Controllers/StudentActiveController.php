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
    public function __construct()
    {

    }
    public function index()
    {
        //
        $url_segment = \Request::segment(1);
        $DataStudent = Student::select('*')->orderBy('ket', 'desc')->get();
        return view($url_segment.'.data.student.index', compact(
            'DataStudent'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Method Create 
        $url_segment = \Request::segment(1);
        $data = new Student;
        return view($url_segment.'.data.student.create',compact('data'), [
            'rooms' => Room::select('id','name_room')->orderBy('name_room', 'asc')->get(),
            'faculties' => Faculty::select('id','name_faculty')->orderBy('name_faculty', 'asc')->get(),
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //return $request->file('image')->move('tinydash/img/', store('image'));

        $url_segment = \Request::segment(1);
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

        return redirect($url_segment.'/data/student')->with('success', "Data berhasil Disimpan");
        
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
        $url_segment = \Request::segment(1);
        $data = Student::where('nim',$nim)->first();
        return view($url_segment.'.data.student.detail', compact(
            'data'
        ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //
        $url_segment = \Request::segment(1);
        $data = Student::where('nim',$nim)->first();
        return view($url_segment.'.data.student.edit', compact('data'), [
            'rooms' => Room::select('id','name_room')->orderBy('name_room', 'asc')->get(),
            'faculties' => Faculty::select('id','name_faculty')->orderBy('name_faculty', 'asc')->get(),
        ]);
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
    public function update(Request $request, $nim)
    {
        $data = Student::where('nim',$nim)->first();
        $data->update($request->all());

        // dd($request->all());
        return back()->with('message', 'Your profile has been updated');
    }

    public function updateprofile(Request $request)
    {
        $id = $request->idparent;
        $data = StudentParent::where('id',$id)->first();
        $data->update($request->all());

        return back()->with('message', 'Your profile has been updated');
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
        $url_segment = \Request::segment(1);
        $student = student::find($id);
        $student->delete();
        return redirect($url_segment.'/data/student')->with('deleted', "Data was deleted");
    }
}
