<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Feature;
class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','image','description_product','category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function features()
    {
        return $this->belongsToMany(Feature::class,'product_features');
    } 
}
