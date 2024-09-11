<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\PropFirmChallenge;
use App\Models\TradingExperience;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tradingExperiences = TradingExperience::all();

        $firmChallenges = PropFirmChallenge::all();

        $reviews=auth()->user()->firmReviews()->latest()
        ->with(['accountSize','user','step','firm'])
        ->get();



        return view('front.profile.index', compact('tradingExperiences', 'firmChallenges','reviews'));
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
        $request->validate([
            'name' => 'required',
            'trading_experience' => 'required|exists:trading_experiences,id',
            'prop_firm_challenge' => 'required|exists:prop_firm_challenges,id',
            'profile_picture' => 'nullable|image'
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'trading_experience_id' => $request->trading_experience,
            'prop_firm_challenge_id' => $request->prop_firm_challenge
        ]);

        if ($request->hasFile('profile_picture')) {

            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures');
            $user->save();
        }


        return redirect()->route('profile.index', ['tab' => 'profile'])
            ->withToastSuccess('Updated successfully');
    }


    public function updatePassword(Request $request)
    {

        $request->validate([
            'actual_password' => 'required|',
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'required|same:new_password'
        ]);

        $user = auth()->user();

        // check if actual password is correct
        if (!\Hash::check($request->actual_password, $user->password)) {
            // add error message in the bag
            return redirect()->route('profile.index', ['tab' => $request->tab])
                ->withErrors(['actual_password' => 'Actual password is incorrect'])
                ->withToastError('Actual password is incorrect');
        }

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect()->route('profile.index', ['tab' => 'password'])
            ->withToastSuccess('Updated successfully');
    }


    public function submitContactUs(Request $request){
        $request->validate([
            'question'=>'required'
        ]);

        ContactUs::create([
            'user_id'=>auth()->id(),
            'question'=>$request->question
        ]);

        return redirect()->route('profile.index', ['tab' => 'support'])
            ->withToastSuccess('Submitted successfully');
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
