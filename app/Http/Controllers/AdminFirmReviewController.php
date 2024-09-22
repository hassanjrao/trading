<?php

namespace App\Http\Controllers;

use App\Models\FirmReview;
use Illuminate\Http\Request;

class AdminFirmReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firmReviews=FirmReview::with(['firm','user','accountSize','step'])->latest()->get();

        return view('admin.firm-reviews.index',compact('firmReviews'));
    }

    public function approve(Request $request, $firmReviewId){

        $firmReview=FirmReview::findorfail($firmReviewId);

        $firmReview->update([
            'is_approved'=> $request->is_approved == 'on' ? 1 : 0
        ]);

        $msg=$request->is_approved == 'on' ? 'approved' : 'disapproved';

        return redirect()->back()->withToastSuccess("Review has been $msg successfully");
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
        //
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
