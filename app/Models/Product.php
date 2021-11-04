<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getProducts($table, $id){
        return $this->where($table, $id)->get();
    }
}
