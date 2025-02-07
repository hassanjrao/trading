<?php

namespace App\Http\Controllers;

use App\Models\AssetType;
use App\Models\Firm;
use App\Models\FirmChallenge;
use App\Models\FirmRequest;
use App\Models\FirmReview;
use App\Models\FirmUserVote;
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
        ->with(['firmReviews'])
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
        ->where('is_approved',1)
        ->with(['accountSize','user','step'])
        ->get();

        $firmCommissionStructures=$firm->commissionStructures()
        ->with(['commissionStructure'])
        ->get();


        $avgRating=$firm->calculateAverageRatings();

        $totalFirmReviewUsefulCount=$firm->firmReviews->sum('review_useful_count');
        $totalFirmReviewNotUsefulCount=$firm->firmReviews->sum('review_not_useful_count');

        $totalFirmReviewCount=$totalFirmReviewUsefulCount+$totalFirmReviewNotUsefulCount;

        return view('front.firms.show', compact('firm','firmChallenges','fireReviews','avgRating','firmCommissionStructures','totalFirmReviewUsefulCount','totalFirmReviewNotUsefulCount','totalFirmReviewCount'));
    }

    public function showWithSlug($slug)
    {
        $firm = Firm::where('slug', $slug)->first();

        if(!$firm){
            return abort(404);
        }


        $firmChallenges = $firm->firmChallenges()
        ->with(['step','accountSize','firmChallengeDetails'])
        ->latest()->get();

        $fireReviews=$firm->firmReviews()->latest()
        ->where('is_approved',1)
        ->with(['accountSize','user','step'])
        ->get();

        $firmCommissionStructures=$firm->commissionStructures()
        ->with(['commissionStructure'])
        ->get();


        $avgRating=$firm->calculateAverageRatings();

        $totalFirmReviewUsefulCount=$firm->firmReviews->sum('review_useful_count');
        $totalFirmReviewNotUsefulCount=$firm->firmReviews->sum('review_not_useful_count');

        $totalFirmReviewCount=$totalFirmReviewUsefulCount+$totalFirmReviewNotUsefulCount;

        $firmPlatforms=$firm->platforms()->get();

        $halfFirmPlatforms=ceil($firmPlatforms->count()/2);

        $firmPlatformsFirst=$firmPlatforms->take($halfFirmPlatforms);
        $firmPlatformsSecond=$firmPlatforms->skip($halfFirmPlatforms);

        $offers=$firm->offers()->latest()->get();



        return view('front.firms.show', compact('offers','firm','firmChallenges','fireReviews','avgRating','firmCommissionStructures','totalFirmReviewUsefulCount','totalFirmReviewNotUsefulCount','totalFirmReviewCount','firmPlatforms','firmPlatformsFirst','firmPlatformsSecond'));
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

    public function reviewUseFul($firmReviewId, $isUseFul){

        $firmReview=FirmReview::findorfail($firmReviewId);

        if($isUseFul==1){
            $firmReview->increment('review_useful_count');
        }else{
            $firmReview->increment('review_not_useful_count');
        }

        return back()->withToastSuccess('Review marked successfully');

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

            $userVotedFirm=null;
            if(auth()->check()){
                $userVotedFirm = FirmUserVote::where('user_id', auth()->id())->first();
            }

        return view('front.firms.most-voted', compact('firms', 'assetTypes','userVotedFirm'));
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


        FirmUserVote::where('user_id', auth()->id())->delete();

        $firm = Firm::find($request->firm_id);



        FirmUserVote::create([
            'user_id' => auth()->id(),
            'firm_id' => $firm->id
        ]);

        return redirect()->route('firms.most-voted', ['type' => $request->type])->withToastSuccess('Vote submitted successfully');
    }
}
