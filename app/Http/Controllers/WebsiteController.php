<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ListOrder;
use Illuminate\Support\Facades\DB;
use App\Cart;
use Illuminate\Support\Facades\Route;

class WebsiteController extends Controller
{
    public function home(){
        return view('dashboards.categories.index1');
    }
    public function properties($id)
    {
        $id_decode = base64_decode($id);
        $product = Product::find($id_decode);
        return view('layouts.properties', compact('product'));
    }

    public function addcart(Request $req)
    {
        $id = $req->id;
        $product = DB::table('products')->where('id', $id)->first();
        if ($product != null) {
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);
            $req->session()->put('cart', $newCart);
        }
        return view('layouts.loadheader_cart',compact('newCart'));
    }

    public function deletecart(Request $req)
    {
        $id = $req->id;
        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);
        if (count($newCart->products) > 0) {
            $req->session()->put('cart', $newCart);
        } else {
            $req->session()->forget('cart');
        }
        return view('layouts.loadheader_cart');
    }

    public function getcart()
    {
        return view('layouts.carts.carts');
    }

    public function deletelistcart(Request $req)
    {
        $id = $req->id;
        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);
        if (count($newCart->products) > 0) {
            $req->session()->put('cart', $newCart);
        } else {
            $req->session()->forget('cart');
        }
        return view('layouts.carts.load_carts');
    }

    public function saveitemlistcart(Request $req)
    {
        $id = $req->id;
        $quanty = $req->quanty;
        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quanty);
        $req->session()->put('cart', $newCart);
        return view('layouts.carts.load_carts');
    }

    public function getcheckout()
    {
        return view('layouts.checkout');
    }

    public function ordersuccess()
    {
        return view('layouts.order_success');
    }

    public function checkout(Request $request)
    {
        $data = $request->only('name','phone','address');
        $order = new Customer($data);
        $order->buy_date = date('y-m-d');
        $order->save();
        $last_id = $order->id;
        $cart = Session('cart')->products;
        foreach ($cart as $ID_sp => $value) {
            $properties_order = new ListOrder();
            $properties_order->customer_id = $last_id;
            $properties_order->product_id = $ID_sp;
            $properties_order->amount = $value["amount"];
            $properties_order->save();
        }
        return redirect()->route('ordersuccess');
    }

    public function returnHome()
    {
        Session::forget('cart');
        return redirect()->route('home');
    }

    public function index()
    {
        $products = Product::all();
        return view('layouts.home', compact('products'));
    }

    public function dell()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*')
        ->where('categories.name', '=', 'DELL')
        ->paginate(6);
        $sellests = ListOrder::orderBy('list_orders.amount', 'desc')->limit(5)->get();
        return view('layouts.dell', compact('products', 'sellests'));
    }

    public function asus()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*')
        ->where('categories.name', '=', 'ASUS')
        ->paginate(6);
        $sellests = ListOrder::orderBy('list_orders.amount', 'desc')->limit(5)->get();
        return view('layouts.asus', compact('products', 'sellests'));
    }

    public function hp()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*')
        ->where('categories.name', '=', 'HP')
        ->paginate(6);
        $sellests = ListOrder::orderByDESC('list_orders.amount')->limit(5)->get();
        return view('layouts.hp', compact('products', 'sellests'));
    }

    public function lenovo()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*')
        ->where('categories.name', '=', 'LENOVO')
        ->paginate(6);
        $sellests = ListOrder::orderBy('list_orders.amount', 'desc')->limit(5)->get();
        return view('layouts.lenovo', compact('products', 'sellests'));
    }

    public function acer()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*')
        ->where('categories.name', '=', 'ACER')
        ->paginate(6);
        $sellests = ListOrder::orderBy('list_orders.amount', 'desc')->limit(5)->get();
        return view('layouts.acer', compact('products', 'sellests'));
    }
    public function contact()
    {
        return view('layouts.contact');
    }
}