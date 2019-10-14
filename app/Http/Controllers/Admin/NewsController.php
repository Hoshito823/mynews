<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\News;

class NewsController extends Controller
{
    
    
    public function add(){
        return view('admin.news.create');
    }
    
    
    
    public function create(Request $request){
        $this->validate($request, News::$rules);
        
        $news = new News;
        $form = $request->all();
        
        //フォームの画像が送信されてきたら、保存する$news->image_pathに画像のパスを保存する
        if (isset($form['image'])){
            //画像本体をpublic/imageフォルダに保存する？
            $path = $request->file('image')->store('public/image');
            
            //newsテーブルの"image_path"カラムにパスを保存している？
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;     
        }
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //フォームから送信されてきた_tokenを削除する
        unset($form['image']);
        
        //DBにformの内容を保存する（$formはすでに画像等は削除された状態）
        $news->fill($form);
        $news->save();
        
        //admin/news/createにリダイレクトする
        return redirect('admin/news/create');    
    }
    
    
    
    public function index (Request $request){
        $cond_title = $request->cond_title;
        if ($cond_title !=''){
            $posts =  News::where('title',$cond_title->get());
        } else {
            $posts = News::all();
        }
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    } 
    
}
