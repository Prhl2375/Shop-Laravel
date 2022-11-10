<?php

namespace App\Http\Controllers;

use App\Models\AdImg;
use App\Models\banner;
use App\Models\Currency;
use App\Models\Product;
use app\widgets\CurrencyWidget;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function indexAction(Request $request){
        $this->setMeta('Shop: Catalog');
        $this->data['currencies'] = Currency::all();
        if(isset($this->queries['search'])){
            $this->data['products'] = Product::where('name', 'LIKE', $this->queries['search'])->paginate(6);
        }else{
            $this->data['products'] = Product::paginate(6);
        }
        $this->data['currency'] = Currency::where('name', CurrencyWidget::getCurrency())->get()[0];
        $this->data['adImg'] = AdImg::all();
        $this->data['ajax'] = $request->ajax();
        return view('catalog', ['data' => $this->data]);
    }
}
