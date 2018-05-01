<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/*
    Fungsi time_ago()
    Mencetak tanggal dalam format x menit/jam/minggu yang lalu
    Source: https ://css-tricks.com/snippets/php/time-ago-function/
*/
if (!function_exists('time_ago')) {

    function time_ago($time)
    {
        $periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "dekade");
        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

        $now = time();

        $difference = $now - strtotime($time);
        $tense = "lalu";

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        return "$difference $periods[$j] $tense ";
    }
}