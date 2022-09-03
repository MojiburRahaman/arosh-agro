<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Product extends Model
{
    use HasFactory;
    protected $casts = [
        'most_view' => 'integer',
    ];
    public function Catagory()
    {
        return $this->belongsTo(Catagory::class, 'catagory_id');
    }
    public function Subcatagory()
    {
        return $this->belongsTo(Subcatagory::class, 'catagory_id');
    }
    public function WithTrash_Attribute()
    {
        return $this->hasMany(Attribute::class, 'product_id')->withTrashed();
    }
    public function Attribute()
    {
        return $this->hasMany(Attribute::class, 'product_id');
    }
    public function Gallery()
    {
        return $this->hasMany(Gallery::class, 'product_id');
    }
    // public function BestDealProduct()
    // {
    //     return $this->hasMany(BestDealProduct::class, 'product_id');
    // }
    public function BestDeal()
    {
        return $this->belongsToMany(BestDeal::class, 'best_deal_products', 'best_deal_id', 'product_id');
    }
    public function ProductReview()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }
}
