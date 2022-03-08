<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListOrder;
use Carbon\Carbon;
use DB;
class DashboardController extends Controller
{
    public function index(){
    $data = ListOrder::select('id','created_at')->get()->groupBy(function($data){
        return Carbon::parse($data->created_at)->format('d');
    });
    $amounts = ListOrder::select(DB::raw('SUM(amount)'))->groupBy(DB::raw('DATE(created_at)'))->get()->toArray();
    $dates = [];
    $amount = [];
    foreach($data as $date => $value){
        $dates[] = $date;
    }
    foreach($amounts as $value){
            $amount[] = $value['SUM(amount)'];
        }
        // $dells = ListOrder::join('products', 'list_orders.product_id', '=', 'products.id')
        // ->join('categories', 'products.category_id', '=', 'categories.id')
        // ->where('categories.name','=','DELL')
        // ->select(DB::raw('SUM(list_orders.amount),DATE(list_orders.created_at)'))
        // ->groupBy(DB::raw('list_orders.created_at'))
        // ->get()
        // ->toArray();
        // $dell = [];
        // // $dells = $dells->toArray();
        // // dd($dells);
        // foreach($dells as $dell){
        //     $dell[] = $dell['SUM(list_orders.amount)'];
        // }
    return view('dashboards.dashboards.index',compact('dates','amount'));
    }
    public function selectMonth(Request $request){
        $month_number = $request->month;
        $data = ListOrder::select('id','created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('d');
        });
        $months = ListOrder::join('products', 'list_orders.product_id', '=', 'products.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where(DB::raw('MONTH(categories.name','=',$month_number))
        ->select(DB::raw('SUM(list_orders.amount),DATE(list_orders.created_at)'))
        ->groupBy(DB::raw('DATE(list_orders.created_at)'))
        ->get()
        ->toArray();
        $dates = [];
        $amount = [];
        foreach($data as $date => $value){
        $dates[] = $date;
        }
        foreach($amounts as $value){
        $amount[] = $value['SUM(list_orders.amount)'];
        }
        return view('dashboards.dashboards.days',compact('dates','amount'));
    }
}