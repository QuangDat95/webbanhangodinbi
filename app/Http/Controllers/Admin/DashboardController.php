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
       $amount1 = DB::table('list_orders')
       $dates = [];
       $amounts = [];
       foreach($data as $date => $value){
           $dates[] = $date;
       }
       foreach($amount1 as $key => $value){
        $amounts[] = $value["amount"];
    }
       return view('dashboards.dashboards',compact('dates','amounts'));
    }
}
