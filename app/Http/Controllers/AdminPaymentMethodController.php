<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

class AdminPaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::latest()->get();

        return view('admin.payment-methods.index', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentMethod = null;

        return view('admin.payment-methods.add_edit', compact('paymentMethod'));
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

        PaymentMethod::create([
            'name' => $request->name,
            'logo_path' => $request->file('logo')->store('payment-methods'),
        ]);

        return redirect()->route('admin.payment-methods.index')->withToastSuccess('Payment Method added successfully');
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
        $paymentMethod = PaymentMethod::findorfail($id);

        return view('admin.payment-methods.add_edit', compact('paymentMethod'));
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
        $paymentMethod = PaymentMethod::findorfail($id);

        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $paymentMethod->update([
            'name' => $request->name,
            'logo_path' => $request->file('logo') ? $request->file('logo')->store('payment-methods') : $paymentMethod->logo_path,
        ]);

        return redirect()->route('admin.payment-methods.index')->withToastSuccess('Payment Method updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentMethod::findorfail($id)->delete();

        return redirect()->route('admin.payment-methods.index')->withToastSuccess('Payment Method deleted successfully');
    }
}
