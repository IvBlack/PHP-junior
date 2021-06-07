<?php

namespace App;
namespace App\Http\Controllers\Admin;

use App\News;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function test1() {
        return view('admin.test1');
    }

    public function test2() {
        //return view('admin.test2');
        return response()->json(News::getNews())
       ->header('Content-Disposition', 'attachment; filename = json.txt')
       ->SetEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
