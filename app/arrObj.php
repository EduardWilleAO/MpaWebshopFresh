<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\User;

class arrObj
{
    public $name;
    public $price;
    public $amount;

    public function __construct($name, $price, $amount){
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }
}