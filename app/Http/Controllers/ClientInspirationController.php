<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InspirationArticle;

class ClientInspirationController extends Controller
{
    public function inspiration()
    {
        $articles = InspirationArticle::all();
        return view('client.inspiration', compact('articles'));
    }

    public function show(InspirationArticle $article)
    {
        return view('client.inspiration_show', compact('article'));
    }
}
