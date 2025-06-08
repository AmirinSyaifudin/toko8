<?php

namespace App\Traits;

trait GenerateKode
{
    public static function generateKodeBarang($prefix = 'BRG')
    {
        $lastNumber = self::withTrashed()->max('id') + 1; // Gunakan ID terakhir +1
        return $prefix . str_pad($lastNumber, 5, '0', STR_PAD_LEFT);
    }
}