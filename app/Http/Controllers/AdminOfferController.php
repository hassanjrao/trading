<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Offer;
use Illuminate\Http\Request;

class AdminOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::latest()
            ->with(['firm'])
            ->get();

        return view('admin.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firms = Firm::all();

        $offer = null;

        return view('admin.offers.add_edit', compact('offer', 'firms'));
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
            'firm' => 'required',
            'discount' => 'required',
            'promo_code' => 'required',
        ]);

        Offer::create([
            'firm_id' => $request->firm,
            'description' => $request->discount,
            'promo_code' => $request->promo_code,
        ]);

        return redirect()->route('admin.offers.index')->withToastSuccess('Created successfully');
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
        $firms = Firm::all();

        $offer = Offer::findorfail($id);

        return view('admin.offers.add_edit', compact('offer', 'firms'));
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
        $offer = Offer::findorfail($id);

        $request->validate([
            'firm' => 'required',
            'discount' => 'required',
            'promo_code' => 'required',
        ]);

        $offer->update([
            'firm_id' => $request->firm,
            'description' => $request->discount,
            'promo_code' => $request->promo_code,
        ]);

        return redirect()->route('admin.offers.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offer::findorfail($id)->delete();

        return redirect()->route('admin.offers.index')->withToastSuccess('Deleted successfully');
    }
}
