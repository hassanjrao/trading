<?php

namespace App\Http\Controllers;

use App\Models\AssetType;
use Illuminate\Http\Request;

class AdminAssetTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assetTypes=AssetType::latest()->get();

        return view('admin.asset-types.index',compact('assetTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assetType=null;

        return view('admin.asset-types.add_edit',compact('assetType'));
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

        AssetType::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.asset-types.index')->withToastSuccess('Asset Type created successfully');
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
        $assetType=AssetType::findorfail($id);

        return view('admin.asset-types.add_edit',compact('assetType'));
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
        $request->validate([
            'name'=>'required',
        ]);

        $assetType=AssetType::findorfail($id);

        $assetType->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.asset-types.index')->withToastSuccess('Asset Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AssetType::findorfail($id)->delete();

        return back()->withToastSuccess('Asset Type deleted successfully');
    }
}
