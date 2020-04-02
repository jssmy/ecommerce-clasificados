<?php

namespace App\Http\Controllers;

use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use App\Models\CardOption;
class BotController extends Controller
{
    //
    const INPUT_UNKNOWN='input.unknown';
    const MAX_INPUT_UNKNOWN= 3;
    const DETECT_SUGGEST =[
        SELF::INPUT_UNKNOWN
    ];
    const SUGGESTS=[
        SELF::INPUT_UNKNOWN => 'default'
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

        /*
        *save suggest inputs
         */
        $suggest = false;
        if(in_array($queryResult->getAction(),SELF::DETECT_SUGGEST)){
            $intends = Cache::get(session()->getId()) + 1;
            Cache::put(session()->getId(),$intends,now()->addMinutes(6));
        }

        if(Cache::get(session()->getId())>SELF::MAX_INPUT_UNKNOWN){

            $messages = (array)json_decode(File::get('messages.json'));
            $index = array_search($queryResult->getAction(),SELF::DETECT_SUGGEST);
            $suggest = SELF::DETECT_SUGGEST[$index];
            $queryResult->setFulfillmentText(collect($messages[$suggest])->random());

            Cache::forget(session()->getId());
        }

        return response()->json([
            'requestText'=>$queryResult->getQueryText(),
            'responseText'=>$queryResult->getFulfillmentText(),
            'loadSuggest'=>$suggest
        ]);

    }

    public function loadDeaultCard(Request $request){
        if($request->has('card') && $request->card!='false'){
            $card = SELF::SUGGESTS[$request->card];
            $cardOption  = CardOption::with('items')->where('name',$card)->first();
            return view('layouts.card-option.card-option',compact('cardOption'));
        }
        return view('layouts.card-option.card-option');

    }

    public function processRequest(Request $request){

    }
}
