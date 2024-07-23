<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($id)
    {
        $articles = Article::orderByDesc('created_at')->get();
        $article = Article::find($id);
        return view('blog', compact('articles', 'article'));
    }
}
