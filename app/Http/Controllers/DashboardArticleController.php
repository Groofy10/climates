<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DashboardArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Dashboard/article-dashboard", ["articles" => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard/create_article");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "articleTitle" => "required",
            "articleAuthor" => "required",
            "articleSubTitle" => "required",
            "articleContent" => "required|min:10",
            "articleImage" => "required|image|file|max:4096",
        ]);

        if ($request->file('articleImage')) {
            $validated['articleImage'] = $request->file('articleImage')->store('article-images', 'public');
        }

        Article::create($validated);
        return redirect()->route('dashboard.article')->with('success', 'Article Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('Dashboard/edit-article', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {

        $validate = [
            "articleTitle" => "required",
            "articleAuthor" => "required",
            "articleSubTitle" => "required",
            "articleContent" => "required|min:10",
        ];

        // if ($request->articleImage  != $article->articleImage) {
        //     $validate['articleImage'] = 'required|image|file|max:4096';
        // }

        $validated = $request->validate($validate);

        Article::where('id', $article->id)->update($validated);
        return redirect()->route('dashboard.article')->with('success', 'Article has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // $article = Article::find($id);

        if ($article->articleImage) {

            $imagePath = public_path('storage/' . $article->articleImage);


            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $article->delete();

        return redirect(route('dashboard.article'))->with('success', 'Article has been deleted!');
    }
}
