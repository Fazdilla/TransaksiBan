<?php

if (!function_exists('on_php_id')) {
    function on_php_id()
    {
        return 'My Helper Ready';
    }
}

function waktu()
{
    date_default_timezone_set('Asia/Makassar');
    return date("Y-m-d H:i:s");
}

function tgl_indo($tgl)
{
    // return strval(substr($tgl, 5, 2));
    return substr($tgl, 8, 2) . ' ' . getbln(substr($tgl, 5, 2)) . ' ' . substr($tgl, 0, 4);
}

function tgl_indojam($tgl, $pemisah)
{
    return substr($tgl, 8, 2) . ' ' . getbln(substr($tgl, 5, 2)) . ' ' . substr($tgl, 0, 4) . ' ' . $pemisah . ' ' .  substr($tgl, 11, 8);
}

function getbln($bln)
{
    $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    return $bln==''?'':$bulan[intval($bln)-1];
}

function dayList($tgl)
{
    // $tanggal = '2018-11-01';
    // $date = date('D', strtotime($tanggal));
    $date = date('D', strtotime($tgl));
    $day = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
    echo $day[$date];
    // return $date[$day];
}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}



