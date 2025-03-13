<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    /** @use HasFactory<\Database\Factories\ShiftFactory> */
    use HasFactory;
    protected $guarded = [];


    public function Penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
