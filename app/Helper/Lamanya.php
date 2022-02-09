<?php
namespace App\Helper;

class Lamanya
{
    public static function get($checkin, $checkout)
    {
        $date1 = date_create($checkin);
        $date2 = date_create($checkout);
        $diff = date_diff($date1,$date2);
        return $diff->format("%a");
    }
}
