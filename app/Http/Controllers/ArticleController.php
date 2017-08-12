<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
	/**
     * �������
     */
    public function store(Request $request)
    {
        $article = new Article;
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        if ($article->save()) {
            return redirect('article');
        } else {
            return back()->withInput()->withErrors('����ʧ��');
        }
    }
    
    
    /**
     * ��������
     */
    public function update(Request $request,$id)
    {
        $article = Article::find($id); 
        $article->title = $request->input('title');
        $article->description = $request->input('description');

        
        
        if ($article->save()) {
            return redirect('article');
        } else {
            return back()->withInput()->withErrors('����ʧ��');
        }
    }
    
    /**
    �������չʾҳ
    **/
    public function create()
    {
        return view('article.create');
    }
    
    //���¸���չʾҳ
    public function edit($id)
    {
    	$article=Article::find($id);

        return view('article.edit',compact('article'));
    }
    
    //����ɾ��
     public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('article');
    }
    
    //�����б�
    public function index()
    {
    	$articles = Article::all();
		 return view('article.index',compact('articles'));
    }
    
    
    //������ʾ
    public function show($id)
    {
        $article=Article::find($id);

        return view('article.show',compact('article'));
    }
}
