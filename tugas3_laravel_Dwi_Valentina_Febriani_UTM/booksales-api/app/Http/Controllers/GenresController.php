<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index() {
        $genres = Genre::all(); 

        return response()->json([
            "success" => true,
            "message" => "Get All Resources",
            "data" => $genres,
            200,
        ]);
    }
}
