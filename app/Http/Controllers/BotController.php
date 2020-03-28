<?php

namespace App\Http\Controllers;

use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Illuminate\Http\Request;
class BotController extends Controller
{
    //
    public function processRequest(Request $request){
        $access = ['credentials'=>'toni-shopper-2-fbdecb496111.json','type'=>'json'];
        $sessionsClient = new SessionsClient($access);
        $session = $sessionsClient->sessionName(getEnv('BOT_PROJECT_ID'),'103970264914913065854');

        // create text input
        $textInput = new TextInput();
        $textInput->setText('HOLA');
        $textInput->setLanguageCode('en-US');

        $queryInput = new QueryInput();
        $queryInput->setText($textInput);

        $response = $sessionsClient->detectIntent($session, $queryInput);
        $queryResult = $response->getQueryResult();

        dd($queryResult);

    }
}
