<?php

namespace App\Http\Controllers;

use App\Models\AccountSize;
use Illuminate\Http\Request;

class AdminAccountSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountSizes=AccountSize::latest()->get();

        return view('admin.account-sizes.index',compact('accountSizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountSize=null;

        return view('admin.account-sizes.add_edit',compact('accountSize'));
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
            'size'=>'required',
        ]);

        AccountSize::create([
            'size'=>$request->size,
        ]);

        return redirect()->route('admin.account-sizes.index')->withToastSuccess('Account Size created successfully');
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
        $accountSize=AccountSize::findorfail($id);

        return view('admin.account-sizes.add_edit',compact('accountSize'));
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
            'size'=>'required',
        ]);

        $accountSize=AccountSize::findorfail($id);

        $accountSize->update([
            'size'=>$request->size,
        ]);

        return redirect()->route('admin.account-sizes.index')->withToastSuccess('Account Size updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AccountSize::findorfail($id)->delete();

        return back()->withToastSuccess('Account Size deleted successfully');
    }
}
