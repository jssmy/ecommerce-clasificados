<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 21:27
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function login(Request $request){
        if($request->ajax()){
            return view('layouts.partials.login-form');
        }
        return view('authenticate');
    }

}
