<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index() {
        $data = new Genre();// membuat objek
        $genres = $data->getGenres(); 

        return view('genres', ['genres' => $genres]);
    }
}
