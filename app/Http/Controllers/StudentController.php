<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\Room;
use App\Models\Faculty;
use App\Models\StudentParent;

use Illuminate\Database\Eloquent\Collection;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function dashboard()
    {
        
        return view('student.index', [
            'title' => 'Student'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reset($nim)
    {
        $reset = Student::select('password')->where('nim',$nim)->first();
        Student::where('nim',$nim)->update(['password'=>Hash::make($nim)]);
        dd($request->all());
        // return redirect()->back()->with('success', "Password $nim berhasil di Reset");
    }
    public function show($nim)
    {
        // Method untuk menampilkan detail dari student
        $data = Student::where('nim',$nim)->first();
        return view('student.data.index', compact('data'),[
            'rooms' => Room::select('id','name_room')->orderBy('name_room', 'asc')->get(),
            'faculties' => Faculty::select('id','name_faculty')->orderBy('name_faculty', 'asc')->get(),
        ]);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //
        $request->validate([
            'nim' => ['required'],
            'fullname' => ['required'],
            'gender' => ['required'],
            'room' => ['required'],
            'faculty' => ['required'],
            'phone' => ['required'],
        ]);
        
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        if($request->file('image') != null){
            $photo=$request->file('image');
            $rename = $request->nim.'.'.$photo->getClientOriginalExtension();
            $photo-> move(public_path().'/img', $rename);
            
            auth()->user()->update([
                'nim' => $request->nim,
                'full_name' => $request->fullname,
                'gender' => $request->gender,
                'room_id' => $request->room,
                'faculty_id' => $request->faculty,
                'phone' => $request->phone,
                'img_student' => $rename,
            ]);

        }else{
            auth()->user()->update([
                'nim' => $request->nim,
                'full_name' => $request->fullname,
                'gender' => $request->gender,
                'room_id' => $request->room,
                'faculty_id' => $request->faculty,
                'phone' => $request->phone,
                //'img_admin' => $rename,
            ]);
        }

        // dd($request->all());
        return back()->with('message', 'Your profile has been updated');
    }

    public function updateprofile(Request $request)
    {
        //
        $request->validate([
            'parentname' => ['required'],
            'parentphone' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            // 'faculty' => ['required'],
            // 'phone' => ['required'],
        ]);

            auth()->user()->parent->update([
                'parent_name' => $request->parentname,
                'phone' => $request->parentphone,
                'address' => $request->address,
                'city' => $request->city,
            ]);

        // dd($request->all());
        return back()->with('message', 'Your profile has been updated');
    }

    public function destroy($id)
    {
        //
    }
}