<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ListOrder;
class Customer extends Model
{
    use HasFactory;
    protected $fillable = ["name","buy_date","phone","address"];
    public function list(){
        return $this->hasMany(ListOrder::class);
    }
}
