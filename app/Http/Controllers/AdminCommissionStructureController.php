<?php

namespace App\Http\Controllers;

use App\Models\CommissionStructure;
use Illuminate\Http\Request;

class AdminCommissionStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissionStructures = CommissionStructure::latest()->get();

        return view('admin.commission-structures.index', compact('commissionStructures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commissionStructure = null;

        return view('admin.commission-structures.add_edit', compact('commissionStructure'));
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
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        CommissionStructure::create([
            'name' => $request->name,
            'image_path' => $request->file('logo')->store('commissionStructures'),
        ]);

        return redirect()->route('admin.commission-structure.index')->withToastSuccess('Added successfully');
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
        $commissionStructure = CommissionStructure::findorfail($id);

        return view('admin.commission-structures.add_edit', compact('commissionStructure'));
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
        $commissionStructure = CommissionStructure::findorfail($id);

        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $commissionStructure->update([
            'name' => $request->name,
            'image_path' => $request->file('logo') ? $request->file('logo')->store('commissionStructures') : $commissionStructure->image_path,
        ]);

        return redirect()->route('admin.commission-structure.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CommissionStructure::findorfail($id)->delete();

        return redirect()->route('admin.commission-structure.index')->withToastSuccess('Deleted successfully');
    }
}
