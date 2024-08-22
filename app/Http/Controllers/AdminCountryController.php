<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class AdminCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::latest()->get();

        return view('admin.countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=null;

        return view('admin.countries.add_edit',compact('country'));
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
            'flag_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        Country::create([
            'name'=>$request->name,
            'flag_image'=>$request->file('flag_image')->store('countries'),
        ]);

        return redirect()->route('admin.countries.index')->withToastSuccess('Country created successfully');
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
        $country=Country::findorfail($id);

        return view('admin.countries.add_edit',compact('country'));
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
        $country=Country::findorfail($id);

        $request->validate([
            'name'=>'required',
            'flag_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $country->update([
            'name'=>$request->name,
        ]);

        if($request->hasFile('flag_image')){
            $country->update([
                'flag_image'=>$request->file('flag_image')->store('countries'),
            ]);
        }

        return redirect()->route('admin.countries.index')->withToastSuccess('Country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::findorfail($id)->delete();

        return redirect()->route('admin.countries.index')->withToastSuccess('Country deleted successfully');
    }
}
