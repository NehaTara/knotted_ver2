<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InspirationArticle;

class WeddingPlannerArticleController extends Controller
{
    public function index()
    {
        $articles = InspirationArticle::all();
        return view('wedding_planner.blogevents.index', compact('articles'));
    }

    public function create()
    {
        return view('wedding_planner.blogevents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $images[] = $path;
            }
        }

        InspirationArticle::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'content' => $request->content,
            'images' => $images,
        ]);

        return redirect()->route('wedding_planner.blogevents')->with('success', 'Article created successfully.');
    }

    public function show(InspirationArticle $article)
    {
        return view('wedding_planner.blogevents.show', compact('article'));
    }

    public function edit(InspirationArticle $article)
    {
        return view('wedding_planner.blogevents.edit', compact('article'));
    }

    public function update(Request $request, InspirationArticle $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'images' => 'sometimes|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = $article->images;
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $images[] = $path;
            }
        }

        $article->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'content' => $request->content,
            'images' => $images,
        ]);

        return redirect()->route('wedding_planner.blogevents')->with('success', 'Article updated successfully.');
    }

    public function destroy(InspirationArticle $article)
    {
        $article->delete();
        return redirect()->route('wedding_planner.blogevents')->with('success', 'Article deleted successfully.');
    }
}
