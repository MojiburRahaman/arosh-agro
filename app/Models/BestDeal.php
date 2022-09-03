<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestDeal extends Model
{
    use HasFactory;

    public function Product()
    {
        return $this->belongsToMany(Product::class, 'best_deal_products', 'best_deal_id', 'product_id');
    }
}
