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
class Product extends  Entity
{
    CONST MAX_LONG_NAME=30;
    protected $primaryKey='id';
    protected $table='products';
    protected $guarded=['id'];
    protected $appends=['price_with_discount','with_discount','human_date_publication'];
    protected $attributes=[
                'name',
                'description',
                'price',
                'discount',
                'stock',
                'priority',
                'img_url_1',
                'img_url_2',
                'img_url_3',
                'img_url_4',
                'img_url_5',
                'img_url_6',
                'img_url_7',
                'img_url_8',
                'category_id',
                'active',
                'created_at',
                'updated_at'
    ];

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

    public function getshortNameAttribute()
    {
        return strlen($this->name) > SELF::MAX_LONG_NAME ?  substr($this->name,0,SELF::MAX_LONG_NAME) : $this->name; ;
    }
}
