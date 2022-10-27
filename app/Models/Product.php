<?php

namespace App\Models;
use App\Models\Connection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'price',
        'balance',

    ];


    use HasFactory;

    public function connection()
    {
        return  $this->hasMany(Connection::class);
    }
}
