<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\ListOrderModel;
use Illuminate\Support\Facades\DB;
use App\Cart;
class WebsiteController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view('frontend.home', compact('products'));
    }

    public function properties($id)
    {
        $product = ProductModel::find($id);
        return view('frontend.properties', compact('product'));
    }

    public function addCart(Request $req, $id)
    {
        $product = DB::table('products')->where('id', '=', $id)->first();
        if ($product != null) {
            $oldCart = Session::get('cart') ? Session::get('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);
            $req->Session()->put('cart', $newCart);
        }
        return view('includes.frontend.giohang');
    }

    public function getCart()
    {
        return view('frontend.giohang.giohang');
    }

    public function deleteListCart(Request $req, $id)
    {
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);
        if (count($newCart->products) > 0) {
            $req->Session()->put('cart', $newCart);
        } else {
            $req->Session()->forget('cart');
        }
        return view('frontend.giohang.list_giohang');
    }

    public function saveItemListCart(Request $req, $id, $quanty)
    {
        $oldCart = Session::get('cart') ? Session::get('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quanty);
        $req->Session()->put('cart', $newCart);
        return view('frontend.giohang.list_giohang');
    }

    public function getCheckout()
    {
        return view('frontend.checkout');
    }

    public function orderSuccess()
    {
        return view('frontend.order_success');
    }

    public function Checkout(Request $req)
    {
        $order = new OrderModel();
        $order->name = $req->name;
        $order->buy_date = date('y-m-d');
        $order->phone = $req->phone;
        $order->address = $req->address;
        $order->save();
        $last_id = $order->id;
        $cart = Session::get('cart')->products;
        foreach ($cart as $ID_sp => $value) {
            $properties_order = new ListOrderModel();
            $properties_order->order_id = $last_id;
            $properties_order->product_id = $ID_sp;
            $properties_order->amount = $value["amount"];
            $properties_order->save();
        }
        return redirect()->route('orderSuccess');
    }

    public function returnHome()
    {
        Session::forget('cart');
        return redirect()->route('home');
    }

    public function dell()
    {
        $products = ProductModel::join('category', 'products.category_id', '=', 'category.id')
        ->select('products.*')
        ->where('category.name', '=', 'DELL')
        ->paginate(6);
        $sellests = ListOrderModel::orderBy('listorders.amount', 'desc')->limit(5)->get();
        return view('frontend.dell', compact('products', 'sellests'));
    }

    public function asus()
    {
        $products = ProductModel::join('category', 'products.category_id', '=', 'category.id')
        ->select('products.*')
        ->where('category.name', '=', 'ASUS')
        ->paginate(6);
        $sellests = ListOrderModel::orderBy('listorders.amount', 'desc')->limit(5)->get();
        return view('frontend.asus', compact('products', 'sellests'));
    }

    public function lienhe()
    {
        return view('frontend.contact');
    }
}