<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //View Data Admin
        $DataAdmin = Admin::where('status', '!=', 1)->get();;
        return view('super.data.admin.index', compact('DataAdmin'),
        [
            'title' => "Super Admin"   
        ]);
    }

    public function dashboard()
    {
        return view('super.index', [
            'title' => 'Super Admin'
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //viwe create new admin
        return view('super.data.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin;
        $admin->username    = $request->username;
        $admin->full_name   = $request->fullname;
        $admin->password    = Hash::make($request->password);;
        $admin->status      = $request->status;

        $photo = $request->file('image');
        $rename = $request->username.'.'.$photo->getClientOriginalExtension();
        $admin->img_admin = $rename;
        $photo-> move(public_path().'/img',$rename);

        $admin->save();
        // dd($request->all());

        return redirect('super/data')->with('success', "Data successfully saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        //
        $url_segment = \Request::segment(1);
        $data = Admin::where('username',$username)->first();
        // $history = History::where('student_id',$data->id)->get();
        return view($url_segment.'.data.admin.detail', compact(
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
        //Deleted Data
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('super/data/admin')->with('deleted', "Data was deleted");
    }
}
