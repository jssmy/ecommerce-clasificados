<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 11:36
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Product extends  Model
{
    protected $table='products';
    protected $guarded=['id'];
    protected $appends=['price_with_discount','with_discount','human_date_publication'];

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

    public function gethumanDatePublicationAttribute()
    {
        return $this->date_publication->day .' de '. trans('month.'.$this->date_publication->month).'-'.$this->date_publication->year;
    }

    public function getdatePublicationAttribute()
    {
        return Carbon::parse($this->created_at);
    }


}
