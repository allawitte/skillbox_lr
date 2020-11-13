<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/12/2020
 * Time: 7:26 PM
 */

namespace App;

class PriceFormatter
{
    public function __construct()
    {
    }

    public function format($number){
        return $number.' rub';
    }

}