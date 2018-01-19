<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\video;

class VideosController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $videos = video::orderBy('id','DESC')->where('us_id',\Auth::user()->id)->paginate(20);
      $files = File::allFiles("./storage/Videos/Completo");
      $arreglo = []; 
      foreach ($files as $file)
          $arreglo[]=$file->getFilename();
      $files = File::allFiles("./storage/Videos/1");
      $arreglo1 = [];
      foreach ($files as $file)
          $arreglo1[]=$file->getFilename();
        return view('adminlte::videos.videos')->with(["repo" => $videos, "personal"=>$arreglo1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function archivo(Request $request)
      {
         if ($request->hasFile('archivos')) {
          $video = new video();
          $video->us_id = \Auth::user()->id;
          $file = $request->file('archivos');
          $nombre = $file[0]->getClientOriginalName();
          $video->vi_nombreViejo = $nombre; 
        if($video->save()){
           $video->vi_nombreNuevo = $video->id.'.mp4';
              $ruta = $file[0]->storeAs('public/Videos/Completo',$video->vi_nombreNuevo); 
              $video->vi_ruta = $ruta;
           $video->save();      
       } 
       
          return ["success"=>true, "nombre"=>$nombre];
        }
        return ;
            
      }
      public function copiar(Request $request){
        $archivo = $request["archivo"];
      	File::copy("./storage/Videos/Completo/".$archivo, "./storage/Videos/1/".$archivo);
      	return $archivo;
      }

      public function borrar(Request $request){
        $archivo = $request["archivo"];
        if(File::exists('./storage/Videos/1/'.$archivo)){
          File::delete('./storage/Videos/1/'.$archivo);
        }else{
          dd('El archivo no existe.');
        }
        return $archivo;
      }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = video::find($id);
       $dir = public_path() . '\storage\Videos\Completo/';
       $videox =$video->vi_nombreNuevo;
       unlink($dir.$videox);
        $video->delete();
         return redirect()->route('videos.index');
    }
}
