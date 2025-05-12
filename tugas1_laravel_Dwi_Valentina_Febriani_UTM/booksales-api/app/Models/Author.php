<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
     private $authors = [
        [
            'id' => 1,
            'name' => 'J.K Rowling',
            'photo' => 'jk_rowling.jpg',
            'bio' => 'British author, best known for the Harry Potter series.',
        ],
        [
            'id' => 2,
            'name' => 'Stephen King',
            'photo' => 'stephen_king.jpg',
            'bio' => 'American author of horror, supernatural fiction, suspense, science fiction, and fantasy novels.',
        ],
        [
            'id' => 3,
            'name' => 'Haruki Murakami',
            'photo' => 'haruki_murakami.jpg',
            'bio' => 'Japanese writer known for his surrealist and magical realist novels.',
        ],
        [
            'id' => 4,
            'name' => 'Chimamanda Ngozi Adichie',
            'photo' => 'chimamanda_adichie.jpg',
            'bio' => 'Nigerian novelist, essayist, and feminist who writes about politics, culture, and identity.',
        ],
        [
            'id' => 5,
            'name' => 'Neil Gaiman',
            'photo' => 'neil_gaiman.jpg',
            'bio' => 'English author known for novels, comic books, graphic novels, and various other forms of literature.',
        ]
    ];

    public function getAuthors() {
        return $this->authors;
    }
}
