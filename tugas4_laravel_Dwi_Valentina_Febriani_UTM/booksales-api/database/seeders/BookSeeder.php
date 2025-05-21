<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => "Harry Potter and the Sorcerer's Stone",
            'description' => "The first book in the Harry Potter series.",
            'price' => 50000.00,
            'stock' => 50,
            'cover_photo' => 'harry_potter.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'title' => "A Game of Thrones",
            'description' => "The first book in the A Song of Ice and Fire series.",
            'price' => 60000.00,
            'stock' => 40,
            'cover_photo' => 'game_of_thrones.jpg',
            'genre_id' => 3,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => "Murder on the Orient Express",
            'description' => "A detective novel featuring Hercule Poirot.",
            'price' => 45000.00,
            'stock' => 30,
            'cover_photo' => 'orient_express.jpg',
            'genre_id' => 2,
            'author_id' => 3,
        ]);

        Book::create([
            'title' => "Harry Potter and the Chamber of Secrets",
            'description' => "The second book in the Harry Potter series.",
            'price' => 52000.00,
            'stock' => 45,
            'cover_photo' => 'chamber_secrets.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'title' => "A Clash of Kings",
            'description' => "The second book in the A Song of Ice and Fire series.",
            'price' => 62000.00,
            'stock' => 35,
            'cover_photo' => 'clash_of_kings.jpg',
            'genre_id' => 3,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => "Harry Potter and the Philosopher's Stone",
            'description' => "The first novel in the Harry Potter series, featuring Harry's first year at Hogwarts.",
            'price' => 15.99,
            'stock' => 120,
            'cover_photo' => 'hp1.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'title' => "A Game of Thrones",
            'description' => "The first novel in A Song of Ice and Fire series, a fantasy epic.",
            'price' => 18.50,
            'stock' => 85,
            'cover_photo' => 'got.jpg',
            'genre_id' => 3,
            'author_id' => 2,
        ]);

    }
}
