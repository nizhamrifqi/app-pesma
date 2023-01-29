<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permit;
use App\Models\History;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nim = auth()->user()->id;
        $history = History::where('student_id',$nim)->orderBy('id', 'desc')->get();
        return view('student.history.index', compact('history'),[
            'title' => 'Student',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('student.history.create',[
        //     'title' => 'Student'
        // ]);

        $data = new History;
        $a = auth()->user()->nim;
        return view('student.history.create',compact('data', 'a'), [
            'permit' => Permit::select('id','name_kind')->get(),
            'title' => 'Super Admin'
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
        $history = new History;
        $history->permit_id = $request->permit;
        $history->student_id = $request->idstudent;
        $history->detail = $request->detail;
        $history->detail = $request->detail;

        // dd($request->all());
        $history->save();
        return redirect('student/history')->with('success', "Data berhasil Disimpan");
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
        // $history = History::where('student_id',$nim)->get();
        // return view('student.history.index', compact('hist$history'),[
        //     'title' => 'Student',
        //     // 'faculties' => Faculty::select('id','name_faculty')->orderBy('name_faculty', 'asc')->get(),
        // ]);

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
        //
    }

    public function history(){
        $active = History::orderBy('id', 'desc')->get();
        return view('super.history.index', compact('active'),[
            'title' => 'current',
        ]);
    }

    public function approve(){
        $history = History::where('status','0')->get();
        return view('super.history.approve', compact('history'),[
            'title' => 'current',
        ]);
        return back();
    }
    public function change($id){
        $reset = History::select('status')->where('student_id',$id)->first();
        History::where('id',$id)->update(['status'=>1]);
        // dd($request->all());
        // return view('super.history.approve', compact('history'),[
        //     'title' => 'current',
        // ]);
        return back();
    }
    public function deceline($id){
        $reset = History::select('status')->where('student_id',$id)->first();
        History::where('id',$id)->update(['status'=>2]);
        // dd($request->all());
        // return view('super.history.approve', compact('history'),[
        //     'title' => 'current',
        // ]);
        return back();
    }
}
