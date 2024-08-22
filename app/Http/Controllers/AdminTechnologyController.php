<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class AdminTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies=Technology::latest()->get();

        return view('admin.technologies.index',compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technology=null;

        return view('admin.technologies.add_edit',compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        Technology::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.technologies.index')->withToastSuccess('Technology created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technology=Technology::findorfail($id);

        return view('admin.technologies.add_edit',compact('technology'));
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
        $technology=Technology::findorfail($id);

        $request->validate([
            'name'=>'required',
        ]);

        $technology->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.technologies.index')->withToastSuccess('Technology updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Technology::findorfail($id)->delete();

        return back()->withToastSuccess('Technology deleted successfully');
    }
}
