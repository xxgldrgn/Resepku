<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resepku</title>  
</head>
<body>
    @include('partials.navbar')
        <h1 class="mb-5">{{ $post->title }}</h1>

        {!! $post->deskripsi !!}


    @include('partials.footer')
</body>
    
</html>