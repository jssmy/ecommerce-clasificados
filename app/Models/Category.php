<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 15:10
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends  Model
{
    protected $table='categories';

    public function scopeActive($query){
        return $query->where('active',1);
    }
}
