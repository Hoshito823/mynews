<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;

//This is NewsController for General Users
class NewsController extends Controller
{
    public function index(Request $request){
        $posts = News::all()->sortByDesc('updated_at');
        
        //$shiftは配列の最小のデータを削除してその値を返すメソッド$headlineには最新の記事が表示され、$postsには最新の記事以外が入っていることになる
        if (count($posts)>0){
            $headline = $posts->shift();
            } else {
                $headline = null;
            }
            
        return view('news.index', ['headline' => $headline,'posts' => $posts]);
        
    }
    
    
    
    
    
    
    
}
