<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
     protected $table = 'products';
     protected $guarded = [];
     public $timestamps = false;

      public function katagori()
    {
        return $this->belongsTo(Katagori::class);
    }

     public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function getFoto()
    {
        if (substr($this->foto, 0, 5) == "https") {
            return $this->foto;
        }

        if ($this->foto) {
            return asset($this->foto);
        }
        //https://placeholder.com/
        return 'https://via.placeholder.com/150x200.png?text=No+Cover';
    }

}
