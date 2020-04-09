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
            'name'=>'input.unknown'
        ]);
        CardOptionItem::insert([
            [
                'card_option_id'=>$default->id,
                'header'=>'<i class="fa fa-calendar" aria-hidden="true"></i>',
                'content'=>'HORARIOS DE ATENCIÓN',
				'message'=>'horario de atención',
                'footer'=>'<button class="btn">👉 Información</button>'
            ],[
                'card_option_id'=>$default->id,
                'header'=>'<i class="fa fa-opencart" aria-hidden="true"></i>',
                'content'=>'CONSULTA DE PRODUCTOS',
				'message'=>'consultar productos',
                'footer'=>'<button class="btn">👉 Consultar</button>'
            ],[
                'card_option_id'=>$default->id,
                'header'=>'<i class="fa fa-credit-card-alt" aria-hidden="true"></i>',
                'content'=>'PROMOCIONES',
				'message'=>'ver promociones',
                'footer'=>'<button class="btn">👉 Información</button>'
            ],[
                'card_option_id'=>$default->id,
                'header'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
                'content'=>'MIS PEDIDOS',
				'message'=>'ver mis pedidos',
                'footer'=>'<button class="btn">👉 Consultar</button>'
            ]
        ]);

        $default = CardOption::create([
            'name'=>'input.schedule'
        ]);
        CardOptionItem::insert([
            [
                'card_option_id'=>$default->id,
                'header'=>'<i class="fa fa-calendar" aria-hidden="true"></i>',
                'content'=>'CONTENIDO HORARIO',
                'footer'=>'NUESTRO HORARIO'
            ]
        ]);

    }
}
