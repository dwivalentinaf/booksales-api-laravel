<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'J.K Rowling',
            'photo' => 'jk_rowling.jpg',
            'bio' => 'British author, best known for the Harry Potter series.',
        ]);

        Author::create([
            'name' => 'Stephen King',
            'photo' => 'stephen_king.jpg',
            'bio' => 'American author of horror, supernatural fiction, suspense, science fiction, and fantasy novels.',
        ]);

        Author::create([
            'name' => 'Haruki Murakami',
            'photo' => 'haruki_murakami.jpg',
            'bio' => 'Japanese writer known for his surrealist and magical realist novels.',
        ]);

        Author::create([
            'name' => 'Chimamanda Ngozi Adichie',
            'photo' => 'chimamanda_adichie.jpg',
            'bio' => 'Nigerian novelist, essayist, and feminist who writes about politics, culture, and identity.',
        ]);

        Author::create([
            'name' => 'Neil Gaiman',
            'photo' => 'neil_gaiman.jpg',
            'bio' => 'English author known for novels, comic books, graphic novels, and various other forms of literature.',

        ]);
    }
}
