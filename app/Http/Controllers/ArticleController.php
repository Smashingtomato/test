<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 全ての記事を取得
        $article = Article::all();

        // 記事一覧を表示
        return view('articles.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 投稿画面表示
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 投稿内容を保存する
        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status,
        ]);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Int $id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Int $id)
    {
        // 選択された記事データを取得
        $article = Article::find($id);

        // 編集処理実行
        $article->fill($request->all())->save();

        // 記事一覧画面へ
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id)
    {
        // 選択された記事データを取得
        $article = Article::find($id);

        // 削除処理実行
        $article->delete();

        // 記事一覧画面へ
        return redirect()->route('articles.index');
    }
}
