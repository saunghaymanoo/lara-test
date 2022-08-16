<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    //
    function exchangeFromMMK(Request $request){
        $amount = (float)$request->amount;
        $currency = strtoupper($request ->currency);
        $rateToFloat = str_replace(",","",Http::get('https://forex.cbm.gov.mm/api/latest')->object()->rates->$currency);
        $restult = $amount*$rateToFloat;
        $newName = uniqid()."-".$request->file('photo')->getClientOriginalName();
        $fileName = $request->photo->storeAs("upload-test",$newName);
        return $fileName;
    }
}
