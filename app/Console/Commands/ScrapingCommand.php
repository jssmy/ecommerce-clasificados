<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
class ScrapingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraping:linio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $enabled=true;
        for($i=0; $i<100; $i++){

            $sitioweb = $this->curl("https://www.olx.com.pe/api/relevance/search?category=832&facet_limit=100&location=1000001&location_facet_limit=20&page=$i&user=17133e8fb77x5679657b");
            $response  = json_decode($sitioweb);

            if(!isset($response->data)) return;

            $products = $response->data;

            foreach ($products as $product) {
                $item = [
                    'name' => $product->title,
                    'description' => $product->description,
                    'price' => $product->price->value->raw,
                    'discount' => 0,
                    'stock' => $product->revision,
                    'category_id' => '1',
                    'brand'=>'INKA KOLA'
                ];
                foreach ($product->images as $index => $image) {
                    if($index>6) break;
                    $item["img_url_" . ($index + 1)] = $image->url;
                }
                dump($item);
                Product::create($item);
            }
        }

    }

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
