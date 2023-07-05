<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
class BookController extends Controller
{
    

public function read(Request $request){

   /*  $books = new Book();

    $data = $books->all();

    return response()->json($data, 200); */
    $book= new Book();
        
        if($request->query("id")){
            $data = $book->find($request->query("id"));
        }else{
            $data= $book->all();
        }

        return response()->json($data);
}

public function create(Request $request){

    $book = new Book();

    $book->name= $request->input("name");

    $book->isbn= $request->input("isbn"); 
    $book->author= $request->input("author");

    $book->edition = $request->input("edition");
    $book->title = $request->input("title");

    $book->save();

    $message=["message" => "Registro Exitoso!!"];

    return response()->json ($message, Response::HTTP_CREATED);
}
public function update(Request $request){

//llamar la variable por el id 
    $idBook = $request->query("id");

    $book = new Book();

    $bookParticular = $book->find($idBook);

    $bookParticular->name = $request->input("name");
    $bookParticular->isbn = $request->input("isbn");
    $bookParticular->author = $request->input("author");
    $bookParticular->edition = $request->input("edition");
    $bookParticular->title = $request->input("title");


    $bookParticular->save();

    $message=[
        "message" => "Actualización Exitosa!!",
        "idBook" => $request->query("id"),
        "nameBook"=>$bookParticular->name
    ];

    return $message;
}

    

public function delete(Request $request){

    $idBook = $request->query("id");

    $book = new Book();

    $bookParticular = $book->find($idBook);

    $bookParticular->delete();

    $message=[
        "message" => "Eliminación Exitosa!!",
        "idBook" => $request->query("id"),
    ];

    return $message;
}

}
