<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 9/02/2020
 * Time: 00:31
 */

namespace App\Http\Controllers;


class MessageController extends Controller
{
    public function index(){
        return view('messenger.index');
    }
}
