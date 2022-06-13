<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'cate_id',
        'brand_id',    
        'name',
        'image',
        'desc',
        'detail',
        'price',
        'sale',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'product_id','slug','id');
    }

    // public function cart(){
    //     return $this->hasMany(Booking::class,'time_id','id');
    // }
}