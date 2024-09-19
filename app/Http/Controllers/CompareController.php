<?php

namespace App\Http\Controllers;

use App\Models\AccountSize;
use App\Models\AssetType;
use App\Models\Firm;
use App\Models\FirmChallenge;
use App\Models\Step;
use App\Models\Technology;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'asset_types' => 'nullable',
            'account_sizes' => 'nullable',
            'steps' => 'nullable',
            'search' => 'nullable',
            'technologies' => 'nullable',
        ]);

        $selectedAssetTypes = $request->asset_types ? explode(',', $request->asset_types) : [];
        $selectedAccountSizes = $request->account_sizes ? explode(',', $request->account_sizes) : [];
        $selectedSteps = $request->steps ? explode(',', $request->steps) : [];
        $selectedTechnologies = $request->technologies ? explode(',', $request->technologies) : [];

        $assetTypes = AssetType::all();

        $top7AccountSizes = AccountSize::limit(7)->get();

        $technologies=Technology::all();


        $otherAccountSizes = AccountSize::whereNotIn('id', $top7AccountSizes->pluck('id'))->get();

        $steps = Step::all();

        $firms = collect();


        $firmChallenges = FirmChallenge::whereHas('firm', function ($query) use ($selectedAssetTypes) {
            $query->when($selectedAssetTypes, function ($query) use ($selectedAssetTypes) {
                $query->whereIn('asset_type_id', $selectedAssetTypes);
            });
        })
            ->when($selectedAccountSizes, function ($query) use ($selectedAccountSizes) {
                $query->whereIn('account_size_id', $selectedAccountSizes);
            })
            ->when($selectedSteps, function ($query) use ($selectedSteps) {
                $query->whereIn('step_id', $selectedSteps);
            })
            ->when($selectedTechnologies, function ($query) use ($selectedTechnologies) {
                $query->whereHas('firm', function ($query) use ($selectedTechnologies) {
                    $query->whereIn('technology_id', $selectedTechnologies);
                });
            })
            ->with(['firm', 'accountSize', 'step', 'firmChallengeDetails', 'firm.technology', 'firm.country'])
            ->latest()
            ->get();



        return view('front.compare.index', compact('assetTypes', 'top7AccountSizes', 'otherAccountSizes', 'steps', 'firmChallenges', 'selectedAssetTypes', 'selectedAccountSizes', 'selectedSteps','technologies','selectedTechnologies'));
    }


    public function getAccountSizes(Request $request)
    {

        $request->validate([
            'step'=>'required|exists:steps,id',
            'firm_id'=>'required|exists:firms,id',
        ]);

        // get steps for the selected account size from firm challenge

        $firmChallenges=FirmChallenge::where('firm_id',$request->firm_id)
        ->where('step_id',$request->step)
        ->get();

        $accountSizes=[];

        foreach ($firmChallenges as $firmChallenge)
        {
            $accountSizes[]=$firmChallenge->accountSize;
        }

        // remove duplicate accountSizes
        $accountSizes=array_unique($accountSizes);


        return response()->json([
            'accountSizes'=>$accountSizes
        ]);
    }
}
