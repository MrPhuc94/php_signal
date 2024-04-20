<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CryptoCurrency;
use Illuminate\Http\Request;
use App\Models\SettingsCont;

class ManageAssetController extends Controller
{
    //

    public function setassetstatus(Request $request, $asset, $status)
    {
        if ($request->has('default')) {
            CryptoCurrency::where('name', $asset)->update(['status' => $status]);
        } else {
            SettingsCont::where('id', 1)->update([
                $asset => $status,
            ]);
        }

        return redirect()->back()->with('success', "Asset Status $status");
    }

    public function useexchange($value)
    {
        SettingsCont::where('id', 1)->update([
            'use_crypto_feature' => $value,
        ]);

        return response()->json(['status' => 200, 'success' => "Action Successful"]);
    }

    public function exchangefee(Request $request)
    {
        if ($request->rate) {
            $rate = $request->rate;
        } else {
            $rate = NULL;
        }

        SettingsCont::where('id', 1)->update([
            'fee' => $request->fee,
            'currency_rate' => $rate
        ]);

        return redirect()->back()->with('success', "Exchange fee and Rate Updated");
    }
}
