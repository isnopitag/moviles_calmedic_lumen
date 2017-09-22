<?php

use App\Models\Medicina;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//CRUD

//CREATE
$router->post('/medicina/new_medicina', function (Request $request) use ($router) {

    $new_medicina = new Medicina();
    $new_medicina->medicina=$request->input('medicina');

    if($new_medicina->save()){
        return response()->json($new_medicina);
    }else{
        return response()->json("Error");
    }
});

//READ
$router->get('/medicina', function () use ($router) {
    //return response()->json("Ruta /medicina");
    return response()->json(Medicina::all());
});
//UPDATE
$router->post('/medicina/edit', function (Request $request) use ($router) {
    $findObject=Medicina::where('id','=',$request->input('id'))->first();

    if($findObject!=null){

        $findObject->medicina=$request->input('medicina');
        $findObject->save();

        return response()->json($findObject);
    }else{
        return response()->json("No encontrado");
    }
    return response()->json($findObject);
});

//DELETE
$router->post('/medicina/delete', function (Request $request) use ($router) {
    $findObject=Medicina::where('id','=',$request->input('id'))->first();

    if($findObject!=null){

        $findObject->delete();

        return response()->json("Eliminado");
    }else{
        return response()->json("No encontrado");
    }
    return response()->json($findObject);
});