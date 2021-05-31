<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class NewsController extends Controller
{
    public function index() {
        // $news =  DB::select('select * from news where 1');
        //$news = DB::table('news')->get();
        //$news = News::all();
        //dd($news);

        return view('news.index')->with('news', News::all());
    }

    public function show(News $news) {
       //$news =  DB::select('select * from news where id = :id', ['id' => $id]);

       //$news = DB::table('news')->find($id);
       //if(!empty($news)) {
           return view('news.One')->with('news', $news);
       //} else {
          // return redirect()->route('news.index');
       }
    }
