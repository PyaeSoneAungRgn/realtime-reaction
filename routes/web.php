<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $articles = Article::withCount('reactions')->get();

    return view('articles', ['articles' => $articles]);
});
