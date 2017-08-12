<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
	/**
     * 添加文章
     */
    public function store(Request $request)
    {
        $article = new Article;
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        if ($article->save()) {
            return redirect('article');
        } else {
            return back()->withInput()->withErrors('保存失败');
        }
    }
    
    
    /**
     * 更新文章
     */
    public function update(Request $request,$id)
    {
        $article = Article::find($id); 
        $article->title = $request->input('title');
        $article->description = $request->input('description');

        
        
        if ($article->save()) {
            return redirect('article');
        } else {
            return back()->withInput()->withErrors('保存失败');
        }
    }
    
    /**
    文章添加展示页
    **/
    public function create()
    {
        return view('article.create');
    }
    
    //文章更新展示页
    public function edit($id)
    {
    	$article=Article::find($id);

        return view('article.edit',compact('article'));
    }
    
    //文章删除
     public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('article');
    }
    
    //文章列表
    public function index()
    {
    	$articles = Article::all();
		 return view('article.index',compact('articles'));
    }
    
    
    //文章显示
    public function show($id)
    {
        $article=Article::find($id);

        return view('article.show',compact('article'));
    }
}
