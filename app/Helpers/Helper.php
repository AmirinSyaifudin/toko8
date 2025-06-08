<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('tanggalIndo')) {
    function tanggalIndo($tanggal)
    {
        return \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y');
    }
}


if (!function_exists('generateKode')) {
    function generateKode($prefix = 'INV')
    {
        return $prefix . date('Ymd') . strtoupper(Str::random(4));
    }
}

if (!function_exists('terbilang')) {
    function terbilang($angka)
    {
        // Logika konversi angka ke terbilang
    }
}