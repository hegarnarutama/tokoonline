<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id');
    }
}
