<?php


namespace app\widgets;


use App\Models\Currency;
use Carbon\Carbon;

class CurrencyWidget{



    public static function getCurrency(){
        if(isset($_COOKIE['currency'])){
            return $_COOKIE['currency'];
        }else{
            return false;
        }
    }


    public static function getCurrencyRate($currency){
        $url = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?';
        //  Initiate curl
        $json = json_decode(file_get_contents($url . 'valcode=USD&json'), true);
        if ($json == null) {
            return null;
        }
        $coreRate = $json[0]['rate'];
        if ($currency == 'USD') {
            return 1;
        } elseif ($currency == 'UAH') {
            return $coreRate;
        } else {
            $json = json_decode(file_get_contents($url . 'valcode=' . $currency . '&json'), true);
            if ($json == null) {
                return null;
            }
            return $coreRate / $json[0]['rate'];
        }
}


public static function updateCurrencyRates(){
        $currencies = Currency::all();
        foreach ($currencies as &$currency){
            $diff = Carbon::now()->diffInDays($currency->updated_at);
            if($diff > 1){
                $rate = self::getCurrencyRate($currency->name);
                if($rate != null){
                    $currency->rate = $rate;
                    $currency->save();
                }
            }
        }
}


}
