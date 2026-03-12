<?php

use Carbon\Carbon;

if (!function_exists('format_datetime')) {
    /**
     * Format datetime dari Y-m-d H:i:s ke d F Y, H:i
     *
     * @param string $datetime
     * @param string $format
     * @return string
     */
    function format_datetime($datetime, $format = 'd F Y, H:i')
    {
        return Carbon::parse($datetime)->translatedFormat($format);
    }
}
if (!function_exists('format_date')) {
    /**
     * Format datetime dari Y-m-d H:i:s ke d F Y, H:i
     *
     * @param string $datetime
     * @param string $format
     * @return string
     */
    function format_date($datetime, $format = 'd F Y')
    {
        return Carbon::parse($datetime)->translatedFormat($format);
    }
}
if (!function_exists('format_time')) {
    /**
     * Format datetime dari Y-m-d H:i:s ke d F Y, H:i
     *
     * @param string $datetime
     * @param string $format
     * @return string
     */
    function format_time($datetime, $format = 'H:i')
    {
        return Carbon::parse($datetime)->translatedFormat($format);
    }
}

if (!function_exists('formatWhatsapp')) {
    function formatWhatsapp($number) {
        return preg_replace('/^0/', '+62', $number);
    }
}


if (!function_exists('whatsapp_url')) {
    /**
     * Generate WhatsApp URL dengan nomor dan pesan
     * 
     * @param string $phone Nomor telepon (format: 628123456789)
     * @param string $message Pesan yang akan dikirim
     * @return string
     */
    function whatsapp_url($phone, $message = '')
    {
        // Bersihkan nomor dari karakter non-digit
        $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
        
        // Jika nomor dimulai dengan 0, ganti dengan 62
        if (substr($cleanPhone, 0, 1) === '0') {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }
        
        // Encode pesan untuk URL
        $encodedMessage = urlencode($message);
        
        // Generate URL
        $url = "https://wa.me/{$cleanPhone}";
        
        if (!empty($message)) {
            $url .= "?text={$encodedMessage}";
        }
        
        return $url;
    }
}