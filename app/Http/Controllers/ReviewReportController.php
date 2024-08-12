<?php

namespace App\Http\Controllers;

use App\Models\AccountSize;
use App\Models\FirmReview;
use App\Models\Step;
use Illuminate\Http\Request;

class ReviewReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountSizes=AccountSize::all();
        $steps=Step::all();

        $documentIconUrl=asset('front-assets/images/document 1.png');

        return view('front.review-report.index',compact('accountSizes','steps','documentIconUrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'firm_id'=>'required|exists:firms,id',
            'review'=>'required',
            'order_confirmation'=>'required|file',
            'main_advantages'=>'nullable',
            'main_drawbacks'=>'nullable',
            'ratings'=>'required',
        ]);

        $ratings=json_decode($request->ratings);

        FirmReview::create([
            'firm_id'=>$request->firm_id,
            'user_id'=>auth()->id(),
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
