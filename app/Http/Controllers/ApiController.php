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
}
