<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'Fiction',
            'description' => 'A story work based on the imagination and not n.'
        ],
        [
            'id' => 2,
            'name' => 'Non-Fiction',
            'description' => 'Based on real facts and information.'
        ],
        [
            'id' => 3,
            'name' => 'Fantasy',
            'description' => 'Contains magical or supernatural elements that are...'
        ],
        [
            'id' => 4,
            'name' => 'Fantasy',
            'description' => 'Contains magical or supernatural elements that are...'
        ],
        [
            'id' => 5,
            'name' => 'Science Fiction',
            'description' => 'Speculative fiction that typically deals with imag...'
        ],
        [
            'id' => 6,
            'name' => 'Mystery',
            'description' => 'Fiction dealing with the solution of a crime or th...'
        ]
    ];

    public function getGenres() {
        return $this->genres;
    }
}
