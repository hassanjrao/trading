<?php

namespace App\Http\Controllers;

use App\Models\AssetType;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type;

        if ($type == 'all') {
            $type = null;
        }

        $offers=Offer::whereHas('firm', function ($query) use ($type) {
            $query->when($type, function ($query) use ($type) {
                $query->where('asset_type_id', $type);
            });
        })
        ->with(['firm'])
        ->latest()->get();

        $assetTypes = AssetType::all();

        return view('front.offers.index', compact('offers','assetTypes'));
    }
}
