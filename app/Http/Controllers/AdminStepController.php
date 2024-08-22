<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;

class AdminStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $steps=Step::latest()->get();

        return view('admin.steps.index',compact('steps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $step=null;

        return view('admin.steps.add_edit',compact('step'));
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
            'steps'=>'required|numeric',
            'name'=>'required|string',
        ]);

        Step::create([
            'steps'=>$request->steps,
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.steps.index')->withToastSuccess('Step created successfully');
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
        $step=Step::findorfail($id);

        return view('admin.steps.add_edit',compact('step'));
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
        $step=Step::findorfail($id);

        $request->validate([
            'steps'=>'required|numeric',
            'name'=>'required|string',
        ]);

        $step->update([
            'steps'=>$request->steps,
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.steps.index')->withToastSuccess('Step updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Step::findorfail($id)->delete();

        return back()->withToastSuccess('Step deleted successfully');
    }
}
