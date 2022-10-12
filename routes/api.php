<?php

use Illuminate\Http\Request;
use App\Events\SendPositionPrueba;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware'=>'auth:api'], function(){
    Route::get('/clientesgps','UsersController@clientes');
    Route::get('/dispositivosgps','UsersController@dispositivos');
    Route::get('/usertoken','UsersController@usertoken');
    Route::get('/dispositivosprueba','UsersController@dispositivos_prueba');
    //mapas
    Route::get('/notificaciones','MapaController@notificaciones');
    Route::get('/notificacion_vista','MapaController@notificacion_vista');
    Route::get('/reportemovimiento','ReporteController@getmovimiento');
    Route::get('/recorrido_dispositivo','MapaController@ruta');
});
Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', 'UsersController@login');
    Route::get('/dispositivosgps','UsersController@dispositivosprueba');
    Route::get('/recorrido_dispositivo','MapaController@ruta');
   // Route::post('/register', 'UsersController@register');
   // Route::get('/logout', 'UsersController@logout')->middleware('auth:api');
  });

  Route::post("/map/prueba",function(Request $request){

    $loc = $request->location;
    $loc = explode(",", $loc);
    $lat = $loc[0];
    $lng = $loc[1];
    $location = ["lat"=>$lat,"lng"=>$lng];
    broadcast(new SendPositionPrueba($location));
    return response()->json(["status"=>true,"location"=>$location]);
});