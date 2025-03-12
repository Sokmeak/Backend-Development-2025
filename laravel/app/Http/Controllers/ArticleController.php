<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    //

    // public function getArticles(){
    //     return response()->json([
    //         'message' => 'Get all articles'
    //     ]);
    // }

    // test Article Controller

  // Get all articles

    public function getArticles()
    {
        $articles = Article::all(); // Fetch all articles from the database
        return response()->json($articles);
    }

    // Get a single article by ID
    public function getArticle($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }
        return response()->json($article);
    }

    // Create a new article
    public function createArticle(Request $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return response()->json($article, 201);
    }

    // Update an article
    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return response()->json($article);
    }

    // Delete an article
    public function deleteArticle($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }
        $article->delete();
        return response()->json(['message' => 'Article deleted successfully']);
    }
}


