<?php

namespace App\Models;
use App\Models\Connection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = [
        'name',
        
    ];

    use HasFactory;

    public function deb_stock()
    {
       return  $this->hasMany(Connection::class);
    }

    public function cred_stock()
    {
        return  $this->hasMany(Connection::class);
    }
}
