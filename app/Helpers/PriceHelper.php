<?php

if (!function_exists('format_rupiah')) {
    /**
     * Format angka ke format Rupiah
     * 
     * @param int|float $price
     * @param bool $showPrefix Default: true (menampilkan "Rp")
     * @return string
     */
    function format_rupiah($price, $showPrefix = true)
    {
        $formatted = number_format($price, 0, ',', '.');
        return $showPrefix ? 'Rp ' . $formatted : $formatted;
    }
}

if (!function_exists('format_price')) {
    /**
     * Alias untuk format_rupiah
     * 
     * @param int|float $price
     * @param bool $showPrefix
     * @return string
     */
    function format_price($price, $showPrefix = true)
    {
        return format_rupiah($price, $showPrefix);
    }
}

if (!function_exists('rupiah')) {
    /**
     * Shorthand untuk format rupiah
     * 
     * @param int|float $price
     * @return string
     */
    function rupiah($price)
    {
        return format_rupiah($price);
    }
}

if (!function_exists('format_rupiah_short')) {
    /**
     * Format rupiah dengan singkatan (K, Jt, M, T)
     * Contoh: 1000 -> Rp 1K, 1000000 -> Rp 1Jt
     * 
     * @param int|float $price
     * @return string
     */
    function format_rupiah_short($price)
    {
        if ($price >= 1000000000000) {
            return 'Rp ' . number_format($price / 1000000000000, 1, ',', '.') . 'T';
        } elseif ($price >= 1000000000) {
            return 'Rp ' . number_format($price / 1000000000, 1, ',', '.') . 'M';
        } elseif ($price >= 1000000) {
            return 'Rp ' . number_format($price / 1000000, 1, ',', '.') . 'Jt';
        } elseif ($price >= 1000) {
            return 'Rp ' . number_format($price / 1000, 1, ',', '.') . 'K';
        }
        
        return 'Rp ' . number_format($price, 0, ',', '.');
    }
}

if (!function_exists('parse_rupiah')) {
    /**
     * Convert string rupiah ke angka
     * Contoh: "Rp 10.000" -> 10000
     * 
     * @param string $rupiah
     * @return int
     */
    function parse_rupiah($rupiah)
    {
        $clean = preg_replace('/[^0-9]/', '', $rupiah);
        return (int) $clean;
    }
}

if (!function_exists('format_rupiah_decimal')) {
    /**
     * Format rupiah dengan desimal
     * Contoh: 10000.50 -> Rp 10.000,50
     * 
     * @param float $price
     * @param int $decimals Default: 2
     * @return string
     */
    function format_rupiah_decimal($price, $decimals = 2)
    {
        return 'Rp ' . number_format($price, $decimals, ',', '.');
    }
}

