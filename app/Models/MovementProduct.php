<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\DocumentReceiptProduct;
use App\Models\DocumentSaleProduct;
use App\Models\DocumentMovementProduct;

class MovementProduct extends Model
{
    use HasFactory;


    public function product()
    {
       return  $this->belongsTo(Product::class);
    }

    public function stock()
    {
       return  $this->belongsTo(Stock::class);
    }

    public function user()
    {
       return  $this->belongsTo(User::class);
    }

    public function documentreceiptproduction()
    {
       return  $this->belongsTo(DocumentReceiptProduct::class);
    }

    public function documentsaleproduct()
    {
       return  $this->belongsTo(DocumentSaleProduct::class);
    }

    public function documentmovementproduct()
    {
       return  $this->belongsTo(DocumentMovementProduct::class);
    }
}
