<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->latest('published_at')->get();

        return view('articles.index', compact('articles'));
    }

    public function list(): JsonResponse
    {
        $articles = Article::with('category')->latest('published_at')->get();

        return response()->json($articles);
    }

    public function show(string $permalink): View
    {
        $article = Article::with('category')
            ->where('permalink', $permalink)
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }
}
