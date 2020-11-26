<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/12/2020
 * Time: 9:01 PM
 */

namespace App\Service;

class PushAll
{
    public $apiKey;

    public function __construct($apiKey){
        $this->apiKey = $apiKey;
    }

}