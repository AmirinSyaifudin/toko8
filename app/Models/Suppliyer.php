<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliyer extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
    public function produk()
    {
        return $this->hasMany(Produk::class);
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
