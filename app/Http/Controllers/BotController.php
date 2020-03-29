<?php

namespace App\Http\Controllers;

use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Illuminate\Http\Request;
use Google\Cloud\Dialogflow\V2\EntityTypesClient;

class BotController extends Controller
{
    //
    public function processResponse(Request $request){
        $access = ['credentials'=>'secret-client.json'];

        $sessionsClient = new SessionsClient($access);
        $session = $sessionsClient->sessionName(getEnv('BOT_PROJECT_ID'),uniqid());

        $textInput = new TextInput();
        $textInput->setText($request->requestText);
        $textInput->setLanguageCode('es');

        $queryInput = new QueryInput();
        $queryInput->setText($textInput);

        $response = $sessionsClient->detectIntent($session, $queryInput);
        $queryResult = $response->getQueryResult();

        return response()->json([
            'requestText'=>$queryResult->getQueryText(),
            'responseText'=>$queryResult->getFulfillmentText()
        ]);


    }
}
