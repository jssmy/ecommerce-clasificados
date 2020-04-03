<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardOption extends Model
{
    protected $guarded=['id'];
    protected $table='card_options';
    public function items(){
        return $this->hasMany(CardOptionItem::class,'card_option_id','id');
    }
}
