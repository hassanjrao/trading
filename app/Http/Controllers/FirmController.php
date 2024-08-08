<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\FirmRequest;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $firm=Firm::findorfail($id);

        return view('front.firms.show', compact('firm'));
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


    public function search(Request $request){
        $request->validate([
            'search'=>'required'
        ]);

        $firms=Firm::where('name', 'like', '%'.$request->search.'%')->get();

        return response()->json([
            'data'=>[
                'firms'=>$firms
            ]
        ]);
    }


    public function request(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        FirmRequest::create([
            'name'=>$request->name
        ]);

        return response()->json([
            'message'=>'Request submitted successfully'
        ]);
    }
}
