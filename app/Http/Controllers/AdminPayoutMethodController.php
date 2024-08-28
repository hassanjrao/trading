<?php

namespace App\Http\Controllers;

use App\Models\PayoutMethod;
use Illuminate\Http\Request;

class AdminPayoutMethodController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payoutMethods = PayoutMethod::latest()->get();

        return view('admin.payout-methods.index', compact('payoutMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payoutMethod = null;

        return view('admin.payout-methods.add_edit', compact('payoutMethod'));
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

        PayoutMethod::create([
            'name' => $request->name,
            'logo_path' => $request->file('logo')->store('payout-methods'),
        ]);

        return redirect()->route('admin.payout-methods.index')->withToastSuccess('Payout Method added successfully');
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
        $payoutMethod = PayoutMethod::findorfail($id);

        return view('admin.payout-methods.add_edit', compact('payoutMethod'));
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
        $payoutMethod = PayoutMethod::findorfail($id);

        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $payoutMethod->update([
            'name' => $request->name,
            'logo_path' => $request->file('logo') ? $request->file('logo')->store('payout-methods') : $payoutMethod->logo_path,
        ]);

        return redirect()->route('admin.payout-methods.index')->withToastSuccess('Payout Method updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PayoutMethod::findorfail($id)->delete();

        return redirect()->route('admin.payout-methods.index')->withToastSuccess('Payout Method deleted successfully');
    }
}
