<?php

namespace App\Http\Controllers;

use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Google\Cloud\Dialogflow\V2\QueryResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use App\Models\CardOption;
use App\Models\CartItem;
use App\Models\Product;
use App\Services\GeolocalizationService;


class BotController extends Controller
{
	 const BODY_RESPONSE_INTENT='{
                      "payload": {
                        "google": {
                          "systemIntent": {
                            
                          }
                        }
                      }
                    }';
    //
    var $suggest=false;
    const INPUT_UNKNOWN='input.unknown';
    const INPUT_SCHEDULE='input.schedule';
	const INPUT_MY_CART='input.my_cart';
	const INPUT_SEARCH_PRODUCTS ='input.search';
    const MAX_INPUT_UNKNOWN= 3;
    const DETECT_SUGGEST =[
        SELF::INPUT_UNKNOWN
    ];

    public function processResponse(Request $request){
        $access = ['credentials'=>'secret-client.json'];

        $sessionsClient = new SessionsClient($access);

        $session = $sessionsClient->sessionName(env('BOT_PROJECT_ID','ecommerce-bot-mamdbv'),rand(1000,33311212));

        $textInput = new TextInput();
        $textInput->setText($request->requestText);
        $textInput->setLanguageCode('es');

        $queryInput = new QueryInput();
        $queryInput->setText($textInput);

        $response = $sessionsClient->detectIntent($session, $queryInput);
        $queryResult = $response->getQueryResult();

        $queryResult = $this->detectSuggest($queryResult);

        $items = '[]';
        if($queryResult->getWebhookPayload()){
            if($queryResult->getWebhookPayload()->getFields()->offsetExists('items')){
                $items = $queryResult
                    ->getWebhookPayload()
                    ->getFields()
                    ->offsetGet('items')
                    ->serializeToJsonString()
                ;
            }
        }

        $items = json_decode($items,true);

        $message = $queryResult->getFulfillmentText();

        return view('layouts.messenger.response',compact('items','message'));
    }

    private function detectUnknow(QueryResult $queryResult){
        if(in_array($queryResult->getAction(),SELF::DETECT_SUGGEST)){
            $intends = Cache::get(session()->getId()) + 1;
            Cache::put(session()->getId(),$intends,now()->addMinutes(6));
        }

        if(Cache::get(session()->getId())>SELF::MAX_INPUT_UNKNOWN){
            $messages = (array)json_decode(File::get('messages.json'));
            $this->suggest = $queryResult->getAction();
            $queryResult->setFulfillmentText(collect($messages[$queryResult->getAction()])->random());
            Cache::forget(session()->getId());
        }
        return $queryResult;
    }

    private function detectSchedule(QueryResult $queryResult){
        if($queryResult->getAction()==self::INPUT_SCHEDULE){
            $this->suggest = $queryResult->getAction();
        }
        return $queryResult;
    }

	private function detectMyCart(QueryResult $queryResult){
		if($queryResult->getAction()==self::INPUT_MY_CART){
			$this->suggest = $queryResult->getAction();
		}
		return $queryResult;
	}

    private function detectGeneridSuggest(QueryResult $queryResult){
        if(in_array($queryResult->getAction(),[
            SELF::INPUT_SEARCH_PRODUCTS,
            SELF::INPUT_MY_CART,
            SELF::INPUT_SCHEDULE
        ])){
            $this->suggest = $queryResult->getAction();
        }
        return $queryResult;
    }

    private  function detectSuggest(QueryResult $queryResult){

        $queryResult = $this->detectUnknow($queryResult);
        $queryResult = $this->detectGeneridSuggest($queryResult);
        return $queryResult;
    }




    public function loadDeaultCard(Request $request){
        if($request->has('card') && $request->card!='false'){
            $card = $request->card;
            $cardOption  = CardOption::with('items')->where('name',$card)->first();
            return view('layouts.card-option.card-option',compact('cardOption'));
        }
        return view('layouts.card-option.card-option');
    }

	public function loadMyCard(){
		$items = CartItem::where('user_id',auth()->id())->active()->with('product')->get();
		return view('layouts.messenger.my-cart',compact('items'));

	}

	public function search(Request $request){
		if($request->buscar){
		    $key = implode(' ',$request->buscar);
            $products = Product::where('description','like',"% $key %")
                        ->orWhere('name','like',"% $key %")->paginate(12);
            session()->put('results',$products->total());
            return view('layouts.messenger.search.products',compact('products'));
        }
	}

	public function location($latitude,$longitude){
        return GeolocalizationService::getAll($latitude,$longitude);
    }

    public function webhook(Request $request){
		$payload = $request->all();
		$queryResult = $payload['queryResult'];
		if($queryResult['action'] == self::INPUT_SEARCH_PRODUCTS){
			$params = $queryResult['parameters'];
			$product 	= $params['product'];
			$marca 		= $params['marca'];
			$fulfillmentText     = isset($queryResult["fulfillmentText"])?$queryResult["fulfillmentText"]:"";
			$fulfillmentMessages = $queryResult["fulfillmentMessages"];
			$fulfillmentMessages[0]['text']['text'][0] = $fulfillmentText;

			$products = Product::whereRaw('1=1');
			foreach($product as $value){
				$products = $products->where(function($query) use ($value){
					$query->orWhere('name','like',"% $value %");
				});
			}
			$products = $products->get();

			$fulfillmentText = empty($fulfillmentText)?'Esto es lo que estás buscando':$fulfillmentText;
			$fulfillmentText = $products->isEmpty()?"Lo siento, no he encontrado ningún producto con estas características":$fulfillmentText;
			$body = json_decode(SELF::BODY_RESPONSE_INTENT);
			$body->fulfillmentText=$fulfillmentText;
			$body->fulfillmentMessages=$fulfillmentMessages;
			$body->payload->items= ["data"=>$products];
			return response()->json($body);

		}
    }
}
