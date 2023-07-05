<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get("/saludo",function(Request $request){
    $message=['mensaje' =>"Hola mundo"];
    return response()->json($message);

});
//LLamndo la clase BookController // Cambiando las rutas para que cada una se comporte diferente
Route::get("/booksGet",[BookController::class,'read']);
Route::post("/booksPost",[BookController::class,'create']);
Route::put("/booksPatch",[BookController::class,'update']);
Route::delete("/booksDelete",[BookController::class,'delete']);
