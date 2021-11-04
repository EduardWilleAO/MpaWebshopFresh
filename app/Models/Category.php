<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getCategories($table, $id){
        return $this->where($table, $id)->get();
    }
}
