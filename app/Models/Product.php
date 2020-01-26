<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 11:36
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends  Model
{
    protected $table='products';
    protected $guarded=['id'];

    public function scopeactive($query){
        return $query->where('active',1);
    }

    public function scopeinactive($query){
        return $query->where('active',0);
    }

    public function getpriceWithDiscountAttribute()
    {
        return round($this->price - ($this->price*($this->discount/100)),2);
    }

    public function getwithDiscountAttribute()
    {
        return $this->discount > 0;
    }
}
