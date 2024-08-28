<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\platforms;
use Illuminate\Http\Request;

class AdminPlatformController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = Platform::latest()->get();

        return view('admin.platforms.index', compact('platforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platform = null;

        return view('admin.platforms.add_edit', compact('platform'));
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

        Platform::create([
            'name' => $request->name,
            'logo_path' => $request->file('logo')->store('platforms'),
        ]);

        return redirect()->route('admin.platforms.index')->withToastSuccess('Payout Method added successfully');
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
        $platform = Platform::findorfail($id);

        return view('admin.platforms.add_edit', compact('platform'));
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
        $platform = Platform::findorfail($id);

        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $platform->update([
            'name' => $request->name,
            'logo_path' => $request->file('logo') ? $request->file('logo')->store('platforms') : $platform->logo_path,
        ]);

        return redirect()->route('admin.platforms.index')->withToastSuccess('Payout Method updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Platform::findorfail($id)->delete();

        return redirect()->route('admin.platforms.index')->withToastSuccess('Payout Method deleted successfully');
    }
}
