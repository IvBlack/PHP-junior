<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all()->toArray();
        //dd($categories);
        return view('news.categories')->with('categories', $categories);
    }

    public function show($name) {
        $category = Category::query()->where('slug', $name)->get();
        $news = News::query()->where('category_id', $category[0]->id)->get();
       //dd($news);

        return view('news.category')->with('news', $news);
    }
}

