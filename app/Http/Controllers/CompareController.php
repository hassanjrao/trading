<?php

namespace App\Http\Controllers;

use App\Models\AccountSize;
use App\Models\AssetType;
use App\Models\Firm;
use App\Models\FirmChallenge;
use App\Models\Step;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'asset_type' => 'nullable',
            'account_size' => 'nullable',
            'step' => 'nullable',
            'search' => 'nullable',
        ]);

        $assetType = $request->asset_type;
        $accountSize = $request->account_size;
        $step = $request->step;

        $assetTypes = AssetType::all();

        $top7AccountSizes = AccountSize::limit(7)->get();


        $otherAccountSizes = AccountSize::whereNotIn('id', $top7AccountSizes->pluck('id'))->get();

        $steps = Step::all();

        $firms = collect();


        if ($request->search) {
            $firmChallenges = FirmChallenge::whereHas('firm', function ($query) use ($assetType, $accountSize, $step) {
                $query->when($assetType, function ($query) use ($assetType) {
                    $query->where('asset_type_id', $assetType);
                });
            })
                ->when($accountSize, function ($query) use ($accountSize) {
                    $query->where('account_size_id', $accountSize);
                })
                ->when($step, function ($query) use ($step) {
                    $query->where('step_id', $step);
                })
                ->with(['firm', 'accountSize', 'step', 'firmChallengeDetails', 'firm.technology','firm.country'])
                ->get();
        } else {
            $firmChallenges = collect();
        }


        return view('front.compare.index', compact('assetTypes', 'top7AccountSizes', 'otherAccountSizes', 'steps', 'firmChallenges'));
    }
}
