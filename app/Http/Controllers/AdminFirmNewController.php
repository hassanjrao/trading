<?php

namespace App\Http\Controllers;

use App\Models\AccountSize;
use App\Models\AssetType;
use App\Models\CommissionStructure;
use App\Models\Country;
use App\Models\Firm;
use App\Models\FirmAbout;
use App\Models\FirmRequest;
use App\Models\PaymentMethod;
use App\Models\PayoutMethod;
use App\Models\Platform;
use App\Models\Step;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminFirmNewController extends Controller
{
    public function index()
    {
        $firms = Firm::latest()
            ->with(['assetType', 'technology', 'country'])
            ->get();

        return view('admin.firms.index', compact('firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firm = null;

        $assetTypes = AssetType::latest()->get();
        $technologies = Technology::latest()->get();
        $steps = Step::latest()->get();
        $accountSizes = AccountSize::latest()->get();
        $countries = Country::latest()->get();

        $paymentMethods = PaymentMethod::latest()->get();
        $payoutMethods = PayoutMethod::latest()->get();
        $platforms = Platform::latest()->get();
        $commissionStructures = CommissionStructure::latest()->get();


        $firmID = null;


        return view('admin.firms.add_edit', compact('firm', 'assetTypes', 'technologies', 'steps', 'accountSizes', 'countries', 'firmID', 'paymentMethods', 'payoutMethods', 'platforms', 'commissionStructures'));
    }


    public function getInitialData()
    {

        $assetTypes = AssetType::latest()->get();
        $tecnologies = Technology::latest()->get();
        $steps = Step::latest()->get();
        $accountSizes = AccountSize::latest()->get();

        return response()->json([
            'data' => [
                'assetTypes' => $assetTypes,
                'tecnologies' => $tecnologies,
                'steps' => $steps,
                'accountSizes' => $accountSizes,
            ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createFirm(Request $request)
    {
        $request->validate([
            'firm_id' => 'nullable|exists:firms,id',
            'name' => 'required',
            'url' => 'required',
            'established_date' => 'required|date',
            'asset_type' => 'required|exists:asset_types,id',
            'technology' => 'required|exists:technologies,id',
            'direct_path_to_live_funded' => 'required',
            'payout_frequency' => 'required',
            'payout_frequency_note' => 'nullable',
            'daily_drawdown' => 'required',
            'country' => 'required|exists:countries,id',
            'logo' => 'nullable|image',
            'profit_split' => 'required',
            'main_benefits' => 'required',
            'main_drawbacks' => 'required',
            'checkout_link' => 'required',
        ]);

        $slug=$request->name;
        // remove spaces
        $slug = str_replace(' ', '', $slug);
        // lowercase
        $slug = strtolower($slug);

        $firmData = [
            'name' => $request->name,
            'url' => $request->url,
            'established_date' => $request->established_date,
            'asset_type_id' => $request->asset_type,
            'technology_id' => $request->technology,
            'direct_path_to_live_funded' => $request->direct_path_to_live_funded == 'true' ? 1 : 0,
            'payout_frequency' => $request->payout_frequency,
            'payout_frequency_note' => $request->payout_frequency_note,
            'daily_drawdown' => $request->daily_drawdown,
            'country_id' => $request->country,
            'profit_split' => $request->profit_split,
            'main_benefits' => $request->main_benefits,
            'main_drawbacks' => $request->main_drawbacks,
            'checkout_link' => $request->checkout_link,
            'slug' => $slug
        ];



        $firm = Firm::find($request->firm_id);

        if ($firm) {
            $firm->update($firmData);
        } else {
            $firm = Firm::create($firmData);
        }

        if ($request->hasFile('logo')) {
            $firm->update([
                'logo_path' => $request->file('logo')->store('firms')
            ]);
        }

        return response()->json([
            'message' => 'Submitted successfully',
            'data' => [
                'firm' => $firm
            ]
        ]);
    }

    public function submitAbout(Request $request)
    {


        $request->validate([
            'firm_id' => 'required|exists:firms,id',
            'chief_executive_officer' => 'required',
            'linkedin_url' => 'required',
            'trust_pilot' => 'required',
            'trustpilot_url' => 'required',
            'commission_strucuture_link' => 'nullable',
            'payment_methods' => 'required|array',
            'payment_methods.*' => 'required|exists:payment_methods,id',
            'payout_methods' => 'required|array',
            'payout_methods.*' => 'required|exists:payout_methods,id',
            'platforms' => 'required|array',
            'platforms.*' => 'required|exists:platforms,id',
            'description' => 'required',
            'commission_structures' => 'nullable|array',
            'commission_structures.*.commission_structure_id' => 'required|exists:commission_structures,id',
            'commission_structures.*.note' => 'nullable',
        ]);

        $firm = Firm::find($request->firm_id);


        $firmAbout =   FirmAbout::updateOrCreate(
            [
                'firm_id' => $request->firm_id
            ],
            [
                'firm_id' => $request->firm_id,
                'chief_executive_officer' => $request->chief_executive_officer,
                'trust_pilot' => $request->trust_pilot,
                'linkedin_url' => $request->linkedin_url,
                'trustpilot_url' => $request->trustpilot_url,
                'description' => $request->description,
                'commission_strucuture_link' => $request->commission_strucuture_link,
            ]
        );

        $firm->paymentMethods()->sync($request->payment_methods);
        $firm->payoutMethods()->sync($request->payout_methods);
        $firm->platforms()->sync($request->platforms);

        if ($request->commission_structures && count($request->commission_structures) > 0) {
            $firm->commissionStructures()->delete();
            foreach ($request->commission_structures as $commissionStructure) {
                $firm->commissionStructures()->create([
                    'commission_structure_id' => $commissionStructure['commission_structure_id'],
                    'note' => $commissionStructure['note'],
                ]);
            }
        }

        return response()->json([
            'message' => 'Firm about updated successfully',
            'data' => [
                'firmAbout' => $firmAbout
            ]
        ]);
    }

    public function requests(Request $request)
    {

        $firmRequests = FirmRequest::latest()->get();

        return view('admin.firms.requests', compact('firmRequests'));
    }


    public function submitChallenges(Request $request)
    {
        $request->validate([
            'firm_id' => 'required|exists:firms,id',
            'firm_challenges' => 'required|array',
            'firm_challenges.*.actual_price' => 'required',
            'firm_challenges.*.actual_price_note' => 'nullable',
            'firm_challenges.*.before_price' => 'required',
            'firm_challenges.*.account_size_id' => 'required|exists:account_sizes,id',
            'firm_challenges.*.step_id' => 'required|exists:steps,id',
            'firm_challenges.*.activation_fee' => 'required',
            'firm_challenges.*.rewards' => 'required',
            'firm_challenges.*.profit_split' => 'nullable',
            'firm_challenges.*.firm_challenge_details' => 'required|array',
            'firm_challenges.*.firm_challenge_details.*.profit_target' => 'required',
            'firm_challenges.*.firm_challenge_details.*.max_daily_loss' => 'required',
            'firm_challenges.*.firm_challenge_details.*.max_daily_loss_note' => 'nullable',
            'firm_challenges.*.firm_challenge_details.*.max_total_drawdown' => 'required',


        ]);

        $firm = Firm::find($request->firm_id);

        // hard delete all firm challenges
        $firm->firmChallenges()->delete();

        foreach ($request->firm_challenges as $challenge) {
            $firmChallenge = $firm->firmChallenges()->create([
                'actual_price' => $challenge['actual_price'],
                'actual_price_note' => $challenge['actual_price_note'],
                'before_price' => $challenge['before_price'],
                'account_size_id' => $challenge['account_size_id'],
                'step_id' => $challenge['step_id'],
                'activation_fee' => $challenge['activation_fee'],
                'rewards' => $challenge['rewards'],
                'profit_split' => $challenge['profit_split'],
            ]);

            foreach ($challenge['firm_challenge_details'] as $detail) {
                $firmChallenge->firmChallengeDetails()->create([
                    'profit_target' => $detail['profit_target'],
                    'max_daily_loss' => $detail['max_daily_loss'],
                    'max_daily_loss_note' => $detail['max_daily_loss_note'],
                    'max_total_drawdown' => $detail['max_total_drawdown'],
                ]);
            }
        }

        return response()->json([
            'message' => 'Firm challenges updated successfully'
        ]);
    }



    public function edit($id)
    {
        $firm = Firm::with([
            'assetType',
            'technology',
            'country',
            'about',
            'paymentMethods',
            'payoutMethods',
            'platforms',
            'firmChallenges',
            'firmChallenges.firmChallengeDetails',
            'firmChallenges.step',
            'commissionStructures'
        ])
            ->findorfail($id);

        $assetTypes = AssetType::latest()->get();
        $technologies = Technology::latest()->get();
        $steps = Step::latest()->get();
        $accountSizes = AccountSize::latest()->get();
        $countries = Country::latest()->get();

        $firmID = $firm->id;

        $paymentMethods = PaymentMethod::latest()->get();
        $payoutMethods = PayoutMethod::latest()->get();
        $platforms = Platform::latest()->get();
        $commissionStructures = CommissionStructure::latest()->get();



        return view(
            'admin.firms.add_edit',
            compact('firmID', 'firm', 'assetTypes', 'technologies', 'steps', 'accountSizes', 'countries', 'paymentMethods', 'payoutMethods', 'platforms', 'commissionStructures')
        );
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


    public function challenges(Firm $firm)
    {
        $firmChallenges = $firm->firmChallenges()
            ->with(['step', 'accountSize', 'firmChallengeDetails'])
            ->latest()->get();

        return view('admin.firm_challenges.challenges', compact('firm', 'firmChallenges'));
    }
}
