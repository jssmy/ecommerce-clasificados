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
        if($request->has('buscar')){
            $products = new Product();

            $keys = explode(' ',$request->buscar);
            foreach ($keys as $key){
                $products = $products->orwhere(function ($q) use ($key){
                    return $q->where('description','like',"%$key%");
                });
            }

            $products = $products->paginate(12);
            return view('home.search',compact('products'));
        }
        return view('home.index');
    }
}
