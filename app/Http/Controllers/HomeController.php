<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){

        if($request->ajax()){
            return view('home.partials.content');
        }
        if($request->buscar){
            $products = Product::with(['item_cart'=>function($query){
                            $query->where('user_id',auth()->id())->active();
                        }])
                        ->where('description','like',"%$request->buscar%")
                        ->orWhere('name','like',"%$request->buscar%")
                        ->paginate(12);

            session()->put('results',$products->total());
            return view('home.search',compact('products'));
        }
        return view('home.index');
    }

    public function test(){
        $latitud = -12.042417499999999;
        $longitud = -76.9583889;
        $markets = \DB::table('ubigeo')
            ->select('id','name','link',
                \DB::raw("round((6371 * ACOS( 
                            SIN(RADIANS(lat)) * SIN(RADIANS($latitud)) 
                            + COS(RADIANS(lng - $longitud)) * COS(RADIANS(lat)) 
                            * COS(RADIANS($latitud)))
                            ),2) AS distance"))
            ->orderBy('distance')
            ->take(5)
            ->get();



    }
    // Definimos la función cURL
    private  function curl($url) {
        $ch = curl_init($url); // Inicia sesión cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Configura cURL para devolver el resultado como cadena
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Configura cURL para que no verifique el peer del certificado dado que nuestra URL utiliza el protocolo HTTPS
        //set the header params
        $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
        $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive: 300";
        $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $header[] = "Accept-Language: en-us,en;q=0.5";
        $header[] = "Pragma: ";

        //assign to the curl request.
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $agents = array(
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1',
            'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4',
            'Mozilla/5.0 (Windows; U; MSIE 7.0; Windows NT 6.0; en-US)',
            'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; da-dk) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1'

        );
        curl_setopt($ch,CURLOPT_USERAGENT,$agents[array_rand($agents)]);
        $info = curl_exec($ch); // Establece una sesión cURL y asigna la información a la variable $info
        curl_close($ch); // Cierra sesión cURL
        return $info; // Devuelve la información de la función
    }
}
