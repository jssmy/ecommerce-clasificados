<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Schedule extends Model
{
    //
    protected $guarded=['id'];
    protected $table='schedule';

    public function getstartAttribute()
    {
        return Carbon::parse($this->getOriginal('start'))->format('h:m a');
    }

    public function getendAttribute()
    {
        return Carbon::parse($this->getOriginal('end'))->format('h:m a');
    }


}
