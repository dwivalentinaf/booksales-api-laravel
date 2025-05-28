<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenresController extends Controller
{
    // Function Menampilakan Data
    public function index() {
        $genres = Genre::all(); 

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resources",
            "data" => $genres,
            
        ], 200);
    }

    // Function Menambahkan Data

    public function store(Request $request) {
        //1.validator
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'description' => 'required|string',
    ]);

        //2.Cek validator error
    if ($validator->fails()) {
        return response()->json([
            "success" => false,
            "message" => $validator->errors()
        ], 422);
    }

        //3.insert data
    $genre = Genre::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);

        //4.response
    return response()->json([
        "success" => true,
        "message" => 'Resource added succesfully!',
        "data" => $genre
    ], 201);

  }

  // Function Menampilkan Data Berdasarkan id

  Public function show(string $id) {
    $genre = Genre::find($id);

    if (!$genre) {
        return response()->json([
            "success" => false,
            "message" => 'Resource not found'
        ], 404);
    }

    return response()->json([
        "success" => true,
        "message" => 'Get detail resource',
        "data" => $genre
    ], 200 );
  }


  // Function Update Data

  public function update(string $id, Request $request) {
    // 1.Mencari data
    $genre = Genre::find($id);

    if (!$genre) {
        return response()->json([
            "success" => false,
            "message" => 'Resource not found'
        ], 404);
    }

    // 2.validator
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'description' => 'required|string',
    ]);

    // cek validator
    if ($validator->fails()) {
        return response()->json([
            "success" => false,
            "message" => $validator->errors()
        ], 422);
    }

    // 3.Siapkan data yang ingin diupdate
    $data = [
        'name' => $request->name,
        'description' => $request->description,
    ];

    // 4.Update data baru ke database
    $genre->update($data);

    return response()->json([
        "success" => true,
        "message" => 'Resource updated succesfully!',
        "data" => $genre
    ], 200);

  }


  // Function Menghapus Data

   public function destroy(string $id) {
    $genre = Genre::find($id);

    if (!$genre) {
        return response()->json([
            "success" => false,
            "message" => 'Resource not found'
        ], 404);
    }

    $genre->delete();

    return response()->json([
        "success" => true,
        "message" => 'Delete resource Succesfully',
    ]);
  }

}
