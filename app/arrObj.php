<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\User;

class arrObj
{
    public $name;
    public $img_url;
    public $price;
    public $amount;

    public function __construct($name, $img_url, $price, $amount){
        $this->name = $name;
        $this->img_url = $img_url;
        $this->price = $price;
        $this->amount = $amount;
    }
}