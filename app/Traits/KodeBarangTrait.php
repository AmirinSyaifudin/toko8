<?php

namespace App\Traits;

trait KodeBarangTrait
{
    public static function generateKode($prefix = 'BRG')
    {
        $lastItem = self::latest()->first();
        $lastNumber = $lastItem ? intval(substr($lastItem->kode, -4)) : 0;
        $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        
        return $prefix . date('Ym') . $nextNumber;
    }
}