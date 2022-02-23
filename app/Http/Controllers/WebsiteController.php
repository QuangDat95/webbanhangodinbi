<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\ListOrderModel;
use App\Cart;
class WebsiteController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view('frontend.', compact('products'));
    }
}
