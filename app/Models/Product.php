<?php

namespace App\Models;
use App\Models\Connection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MovementProduct;

class Product extends Model
{

    protected $fillable = [
        'name',
        'price',
        'balance',

    ];


    use HasFactory;

    public function movementproduct()
    {
        return  $this->hasMany(MovementProduct::class);
    }
}
