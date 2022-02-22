<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderModel;
use App\Models\ProductModel;
class ListOrderModel extends Model
{
    use HasFactory;
    protected $table = "listorders";
    protected $fillable = ["order_id","product_id"];
    public function order(){
        return $this->belongsTo(OrderModel::class,'order_id','id');
    }
    public function product(){
        return $this->belongsTo(ProductModel::class,'product_id','id');
    }
}