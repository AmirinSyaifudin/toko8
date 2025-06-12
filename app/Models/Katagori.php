<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katagori extends Model
{
    use HasFactory;
    protected $table = 'katagori';
    protected $guarded = [];
    // public $timestamps = false;
      public $timestamps = 'id';
    // protected $primaryKey = 'id';

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

}
