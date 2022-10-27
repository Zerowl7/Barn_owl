<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $fillable = [
        'amt',
        'deb_stock',
        'cred_stock',
        'product_id',
    ];
    use HasFactory;

    public function product()
    {
        return  $this->belongsTo(Product::class);
    }
    public function stock()
    {
        return  $this->belongsTo(Stock::class);
    }
}
