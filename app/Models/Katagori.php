<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katagori extends Model
{
    use HasFactory;
    protected $table = 'katagori';
    protected $guarded = [];
    public $timestamps = false;
    // protected $primaryKey = 'id';

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
