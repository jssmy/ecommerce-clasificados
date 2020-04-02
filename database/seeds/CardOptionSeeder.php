<?php

use Illuminate\Database\Seeder;
use App\Models\CardOption;
use App\Models\CardOptionItem;
class CardOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // default card option
        $default = CardOption::create([
            'name'=>'default'
        ]);
        CardOptionItem::insert([
            [
                'card_option_id'=>$default->id,
                'header'=>'<i class="fa fa-calendar" aria-hidden="true"></i>',
                'content'=>'HORARIOS DE ATENCIÓN',
                'footer'=>'<button class="btn">👉 Información</button>'
            ],[
                'card_option_id'=>$default->id,
                'header'=>'<i class="fa fa-opencart" aria-hidden="true"></i>',
                'content'=>'CONSULTA DE PRODUCTOS',
                'footer'=>'<button class="btn">👉 Consultar</button>'
            ],[
                'card_option_id'=>$default->id,
                'header'=>'<i class="fa fa-credit-card-alt" aria-hidden="true"></i>',
                'content'=>'PROMOCIONES',
                'footer'=>'<button class="btn">👉 Información</button>'
            ],[
                'card_option_id'=>$default->id,
                'header'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
                'content'=>'MIS PEDIDOS',
                'footer'=>'<button class="btn">👉 Consultar</button>'
            ]
        ]);

    }
}
