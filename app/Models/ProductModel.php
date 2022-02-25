<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use App\Models\FeatureModel;
class ProductModel extends Model
{
    use HasFactory;
    // protected $table="products";
    protected $fillable = ['name','price','image','description','category_id'];
    public function category(){
        return $this->belongsTo(CategoryModel::class,'category_id','id');
    }
    public function features(){
        return $this->belongsToMany(FeatureModel::class,'product_feature','product_id','feature_id');
    } 
}
