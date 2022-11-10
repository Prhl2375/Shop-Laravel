<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Currency;
use App\Models\Product;
use app\widgets\CurrencyWidget;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function indexAction(){
        $this->setMeta('Shop: Home');
        $this->data['banners'] = Banner::where('display', 1)->get();
        $this->data['currencies'] = Currency::all();
        $this->data['products'] = Product::paginate(8);
        $this->data['currency'] = Currency::where('name', CurrencyWidget::getCurrency())->get()[0];
        return view('main', ['data' => $this->data]);
    }
}
