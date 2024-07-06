<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Articles</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    @vite('resources/js/app.js')

    <script type="module">
        Echo.channel(`reactions`)
            .listen('ReactionUpdated', (e) => {
                console.log(e.payload);
                document.getElementById(e.payload.id).innerHTML = e.payload.reactions_count;
            });
    </script>
</head>

<body class="font-sans antialiased container mx-auto my-4 space-y-4 bg-gray-100">
    @foreach ($articles as $article)
    <div class="w-full bg-white shadow-md rounded-md p-4 space-y-3">
        <p>Title: <span class="text-gray-500">{{ $article->title }}</span></p>
        <p>Description: <span class="text-gray-500">{{ $article->description }}</span></p>
        <p>Reaction Count: <span id="{{ $article->id }}" class="text-blue-500 texl-lg">{{ $article->reactions_count
                }}</span></p>
    </div>
    @endforeach
</body>

</html>