<?php

namespace App\Http\Controllers;

use App\Models\AccountSize;
use App\Models\FirmChallenge;
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
            'step_id'=>'required|exists:steps,id',
            'account_size_id'=>'required|exists:account_sizes,id',
            'order_confirmation'=>'required|file'
        ]);

        $ratings=json_decode($request->ratings);



        FirmReview::create([
            'firm_id'=>$request->firm_id,
            'user_id'=>auth()->id(),
            'account_size_id'=>$request->account_size_id,
            'step_id'=>$request->step_id,
            'review'=>$request->review,
            'order_confirmation_path'=>$request->file('order_confirmation')->store('order_confirmations'),
            'main_advantages'=>$request->main_advantages,
            'main_disadvantages'=>$request->main_drawbacks,
            'rating_dashboard'=>$ratings->dashboard,
            'rating_support_team'=>$ratings->support_team,
            'rating_payout_process'=>$ratings->payout_process,
            'rating_rules'=>$ratings->rules,
            'rating_general'=>$ratings->general_rating,
        ]);

        return response()->json([
            'message'=>'Review submitted successfully'
        ]);
    }


    public function getSteps(Request $request)
    {
        $request->validate([
            'account_size_id'=>'required|exists:account_sizes,id',
            'firm_id'=>'required|exists:firms,id',
        ]);

        // get steps for the selected account size from firm challenge

        $firmChallenges=FirmChallenge::where('firm_id',$request->firm_id)->where('account_size_id',$request->account_size_id)->get();

        $steps=[];

        foreach ($firmChallenges as $firmChallenge)
        {
            $steps[]=$firmChallenge->step;
        }

        // remove duplicate steps
        $steps=array_unique($steps);




        return response()->json([
            'steps'=>$steps
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
