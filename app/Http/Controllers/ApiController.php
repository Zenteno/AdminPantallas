<?php

namespace App\Http\Controllers;

use App\video;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function descargar($id){
		$video = video::find($id);
		$dir = public_path() . '/storage/Videos/Completo/';
		$videox =$video->vi_nombreNuevo;
		return response()->download($dir.$videox);
	}
	public function archivo(Request $request)
	{
		if ($request->hasFile('archivos')) {
			$video = new video();
			$video->us_id = \Auth::user()->id;
			$file = $request->file('archivos');
			$nombre = $file[0]->getClientOriginalName();
			$extension = pathinfo($file[0]->getClientOriginalName(), PATHINFO_EXTENSION);
			$video->vi_nombreViejo = $nombre; 
			if($video->save()){
		   		$video->vi_nombreNuevo = $video->id.".".$extension;
			  	$ruta = $file[0]->storeAs('public/Videos/Completo',$video->vi_nombreNuevo); 
			  	$video->vi_ruta = $ruta;
		   		$video->save();      
	   		} 
			return $video;
		}
		return ;
			
	}
}
