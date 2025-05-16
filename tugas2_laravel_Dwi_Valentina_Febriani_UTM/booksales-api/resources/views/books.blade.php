<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ini adalah Halaman Buku</h1>

    @foreach ($books as $item)
        <ul>
            <li>{{ $item['title'] }}</li>
            <li>{{ $item['description'] }}</li>
            <li>{{ $item['price'] }}</li>
            <li>{{ $item['stock'] }}</li>
            <li>{{ $item['cover_photo'] }}</li>
            <li>{{ $item['genre_id'] }}</li>
            <li>{{ $item['author_id'] }}</li>
        </ul>
    @endforeach
    

</body>
</html>