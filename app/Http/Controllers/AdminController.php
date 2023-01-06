<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
// use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'title' => 'admin'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.index', [
            'title' => 'Admin'
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
        $store = new Admin;
        $store->full_name = $request->fullname;
        $store->username = $request->username;
        $store->password = Hash::make($request['password']);
        $store->status   = $request->status;
        $store->save();
        // dd($request->all());

        //Menambahkan File foto lalu pindahkan ke dalam file img
        // $d = $request->image;
        // $data = $request->nim.'.'.$d->getClientOriginalExtension();
        // $student-> img_student = $data;
        // $d-> move(public_path().'/img', $data);
        
        return redirect('super/profile/')->with('success', "Data berhasil Disimpan");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $data = Admin::find($username);


        //tidak file upload
        // $edit = Admin::where('username',$username)->first();
        // return view('admin.profile.update', compact(
        //     'edit'
        // ));

        //ada file upload
        // $data = Admin::where('username',$username)->first();
        // return view('admin.profile.index', compact(
        //     'data'
        // ));

        // $data = Admin::where('id',$id)->first();
        // return view('super.profile', compact(
        //     'data'
        // ));
        // dd($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        // $edit = Admin::where('username',$username);
        // return view('admin.profile.update',compact(
        //     'edit'
        // ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {



        // $request->validate([
        //     'fullname' => ['required', 'string', 'min:5', 'max:191'],
        //     'username' => ['required', 'alpha_num', 'min:3'],
        //     'img_admin' => ['required'],
        // ]);

        // $data = Admin::find($username);
        // $data -> update($request->all());

        // // dd($data);
        // // $store = Admin::find();
        // $store->full_name = $request->fullname;
        // $store->username = $request->username;
        // $store->password = Hash::make($request['password']);
        // $store->status   = $request->status;
        // $store->save();
        // dd($request->all());

        // $data = $request->user()->update($request->all());
        
        // $credential = $request->validate([
        //     'username' => ['required'],
        //     'full_name' => ['required'],
        //     'password' => ['required'],
        // ]);

        // dd($credential);

        // $store = Admin::select('password')->where('username',$username)->first();
        // Admin::where('id',$id)->update([$credential]);
        // $request->user()->update(
        //         $request->all());
        // dd($store);



        // return redirect('admin/profile/')->with('success', "Data berhasil Disimpan");
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



    public function editprofile()
    {
        return view('super.profile.index');
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'min:5', 'max:191'],
            'username' => ['required', 'alpha_num', 'min:3'],
        ]);
        
        
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        if($request->file('image') != null){
            $photo=$request->file('image');
            $rename = $request->username.'.'.$photo->getClientOriginalExtension();
            $photo-> move(public_path().'/img', $rename);
            
            auth()->user()->update([
                'full_name' => $request->fullname,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'img_admin' => $rename,
            ]);

        }else{
            auth()->user()->update([
                'full_name' => $request->fullname,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                //'img_admin' => $rename,
            ]);
        }

        // dd($request->all());
        return back()->with('message', 'Your profile has been updated');
    }
}
