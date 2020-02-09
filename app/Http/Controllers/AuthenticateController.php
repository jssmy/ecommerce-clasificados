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
        if($request->ajax() && !auth()->check()){
            return view('layouts.partials.login-form');
        }if($request->ajax() && auth()->check()){
            return view('layouts.partials.login-form');
        }else if(!auth()->check()){
            return view('authenticate');
        }

    }

}
