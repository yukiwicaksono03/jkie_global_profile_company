<?php

if (!function_exists('current_lang')) {
    function bahasa() {
        return session('locale', 'en');
    }
}