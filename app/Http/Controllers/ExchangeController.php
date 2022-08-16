<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExchangeController extends Controller
{
    //
    function exchange(Request $request){
        $rates = Http::get('https://forex.cbm.gov.mm/api/latest')->object()->rates;
        $amount = $request->amount;
        $fromCurrencyRate = str_replace(",","",$rates->{strtoupper($request->fromCurrency)});
        $toCurrencyRate = str_replace(",","",$rates->{strtoupper($request->toCurrency)});
        $mmkRate = $amount*$fromCurrencyRate;
        $result = round($mmkRate/$toCurrencyRate,2);

        $record = new Record();
        $record->input = $request->amount." ".$request->fromCurrency;
        $record->output = $result;
        $record->save();
        return view('exchange-result',[
            'result' => $result,
            'records' => $record->all()
        ]);
    }
}
