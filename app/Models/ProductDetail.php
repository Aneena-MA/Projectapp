<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable=['product_id','quantity','total_amount','product_file'];
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
     }
}
