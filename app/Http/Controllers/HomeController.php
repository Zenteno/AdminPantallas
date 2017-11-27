<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use File;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
      $files = File::allFiles("./storage/Videos/Completo");
      $arreglo = [];
      foreach ($files as $file)
          $arreglo[]=$file->getFilename();
      $files = File::allFiles("./storage/Videos/1");
      $arreglo1 = [];
      foreach ($files as $file)
          $arreglo1[]=$file->getFilename();
      return view('vendor.adminlte.home')->with(["repo" => $arreglo, "personal"=>$arreglo1]);
        //return view('adminlte::home');
    }
   public function archivo(Request $request)
    {
      if ($request->hasFile('archivos')) {
    		$file = $request->file('archivos');
    		$nombre = $file[0]->getClientOriginalName();
    		$file[0]->storeAs('public/Videos/Completo',$nombre);
    		return ["success"=>true, "nombre"=>$nombre];
    	}
    	return;
    }
    public function copiar(Request $request){
      $archivo = $request["archivo"];
    	File::copy("./storage/Videos/Completo/".$archivo, "./storage/Videos/1/".$archivo);
    	return $archivo;
    }
}
