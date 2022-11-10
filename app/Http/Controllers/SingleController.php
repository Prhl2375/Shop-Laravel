<?php

namespace App\Http\Controllers;

use App\Models\AdImg;
use App\Models\Currency;
use App\Models\Product;
use App\Models\SingleProductImg;
use app\widgets\CurrencyWidget;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function indexAction(Request $request){
        $productName = $this->queries['product'];
        $this->data['product'] = Product::where('name', 'like', $productName)->get()[0];
        $this->setMeta($this->data['product']['name']);
        $this->data['singleProductGallery'] = SingleProductImg::where('product_id', 'like', $this->data['product']['id'])->get();
        $this->data['currencies'] = Currency::all();
        $this->data['currency'] = Currency::where('name', CurrencyWidget::getCurrency())->get()[0];
        $this->data['adImg'] = AdImg::all();
        $this->data['ajax'] = $request->ajax();
        return view('single', ['data' => $this->data]);
    }
}
