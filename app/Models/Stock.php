<?php

namespace App\Models;
use App\Models\Connection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MovementProduct;
use App\Models\DocumentReceiptProduct;
use App\Models\DocumentSaleProduct;
use App\Models\DocumentMovementProduct;

class Stock extends Model
{

    protected $fillable = [
        'name',
        
    ];

    use HasFactory;

    // public function MovementProduct()
    // {
    //     return  $this->hasMany(MovementProduct::class);
    // }


    // public function DocumentReceiptProduct()
    // {
    //     return  $this->hasMany(DocumentReceiptProduct::class);
    // }

    // public function DocumentSaleProduct()
    // {
    //     return  $this->hasMany(DocumentSaleProduct::class);
    // }

    // public function DocumentMovementProduct()
    // {
    //     return  $this->hasMany(DocumentMovementProduct::class);
    // }

}
