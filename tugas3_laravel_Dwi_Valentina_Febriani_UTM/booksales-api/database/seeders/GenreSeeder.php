<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' =>  'Action',
            'description' =>  'Genre yang menekankan pada adegan aksi'
        ]);

        Genre::create([
            'name' => 'Fantasy',
            'description' => 'Genre dengan elemen sihir, dunia imajinatif, dan makhluk mistis.'
        ]);

        Genre::create([
            'name' => 'Mystery',
            'description' => 'Genre yang fokus pada pemecahan teka-teki atau kejahatan.'
        ]);

        Genre::create([
            'name' => 'Romance',
            'description' => 'Genre yang berpusat pada hubungan romantis antar karakter.'
        ]);

        Genre::create([
            'name' => 'Horror',
            'description' => 'Genre yang bertujuan menimbulkan rasa takut atau tegang.'
        ]);

        Genre::create([
            'name' => 'Science Fiction',
            'description' => 'Genre yang membahas teknologi futuristik, luar angkasa, atau konsep ilmiah.'
        ]);

        Genre::create([
            'name' => 'Philosophy',
            'description' => 'Genre yang mengeksplorasi pertanyaan mendalam tentang eksistensi dan kehidupan.'
        ]);

        
    }
}
