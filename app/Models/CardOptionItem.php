<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
class CardOptionItem extends Model
{
    //
    const ITEM_SCHEDULE=2;
    protected $guarded=['id'];
    protected $table='card_option_items';
    public function getcontentAttribute(){
        Log::info($this->card_option_id);

        if(SELF::ITEM_SCHEDULE==$this->card_option_id){
            $ul = '<ul>';
            $schedules = Schedule::get();
            foreach ($schedules as $schedule){
                $ul.="<li> $schedule->day : de $schedule->start a $schedule->end</li>";
            }
            return $ul;
        }
        return $this->getOriginal('content');
    }
}
