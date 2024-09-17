<?php

namespace App\Http\Controllers;

use App\Models\AssetType;
use App\Models\Firm;
use App\Models\FirmChallenge;
use App\Models\FirmRequest;
use App\Models\Step;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->type;

        if ($type == 'all') {
            $type = null;
        }

        $assetTypes = AssetType::all();

        $firms = Firm::when($type, function ($query) use ($type) {
            return $query->where('asset_type_id', $type);
        })
        // ->whereHas('firmReviews')
        ->latest()->get();

        return view('front.firms.index', compact('firms', 'assetTypes'));
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
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $firm = Firm::findorfail($id);


        $firmChallenges = $firm->firmChallenges()
        ->with(['step','accountSize','firmChallengeDetails'])
        ->latest()->get();

        $fireReviews=$firm->firmReviews()->latest()
        ->with(['accountSize','user','step'])
        ->get();

        $firmCommissionStructures=$firm->commissionStructures()
        ->with(['commissionStructure'])
        ->get();


        $avgRating=$firm->calculateAverageRatings();

        return view('front.firms.show', compact('firm','firmChallenges','fireReviews','avgRating','firmCommissionStructures'));
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


    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $firms = Firm::where('name', 'like', '%' . $request->search . '%')->get();

        return response()->json([
            'data' => [
                'firms' => $firms
            ]
        ]);
    }


    public function request(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        FirmRequest::create([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Request submitted successfully'
        ]);
    }


    public function mostVoted(Request $request)
    {

        $type = $request->type;

        if ($type == 'all') {
            $type = null;
        }

        $assetTypes = AssetType::all();

        // ORDER BY votes and only those with votes
        $firms = Firm::when($type, function ($query) use ($type) {
            return $query->where('asset_type_id', $type);
        })
        // ->has('userVotes')
            ->withCount('userVotes')
            ->orderBy('user_votes_count', 'desc')
            ->get();

        return view('front.firms.most-voted', compact('firms', 'assetTypes'));
    }


    public function summary(FirmChallenge $firmChallenge)
    {

        $firmChallenge->load(['firm', 'step', 'accountSize', 'firmChallengeDetails']);
        $firm = $firmChallenge->firm;

        $steps = Step::all();

        return view('front.firms.summary', compact('firm', 'firmChallenge', 'steps'));
    }


    public function submitVote(Request $request)
    {

        $request->validate([
            'firm_id' => 'required|exists:firms,id'
        ]);

        $firm = Firm::find($request->firm_id);

        $firm->userVotes()->attach(auth()->id());

        return redirect()->route('firms.most-voted', ['type' => $request->type])->withToastSuccess('Vote submitted successfully');
    }
}
