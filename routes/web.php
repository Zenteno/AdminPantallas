<?php


use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$files = File::allFiles("./storage/Videos/Completo");
	$arreglo = [];
	foreach ($files as $file)
	    $arreglo[]=$file->getFilename();

	$files = File::allFiles("./storage/Videos/1");
	$arreglo1 = [];
	foreach ($files as $file)
	    $arreglo1[]=$file->getFilename();

	return view('welcome')->with(["repo" => $arreglo, "personal"=>$arreglo1]);
})->middleware('auth');


Route::post('/archivos', function(Request $request){
	if ($request->hasFile('archivos')) {
		$file = $request->file('archivos');
		$nombre = $file[0]->getClientOriginalName();
		$file[0]->storeAs('public/Videos/Completo',$nombre);
		return ["success"=>true, "nombre"=>$nombre];
	}
	return;

});
Route::post('/copiar', function(Request $request){
	$archivo = $request["archivo"];
	File::copy("./storage/Videos/Completo/".$archivo, "./storage/Videos/1/".$archivo);
	return $archivo;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
