<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use View;
use App\Category;

class NewsController extends Controller
{
    public function index() {
        //$news = DB::select('select * from news where 1');
        //$news = DB::table('news')->get();
        $news = News::query()->paginate(10);
        //dd($news);

        return view('admin.index')->with('news', $news);
    }

    //заходим на пустую форму, никакие даные от юзера не приходят
    public function create() { // let's make DI for Request-class
        $news = new News();
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'name'])->get()
        ]);
    }

    //перенаправляет нас в форму
    public function edit(News $news) {
        return View('admin.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'name'])->get()
        ]);
    }

    //функция апдейтит текущую новость тем, что ввел юзер через $request
    public function update (Request $request, News $news) {
        $this->validate($request, News::rules(), [], News::attrNames());
        $data = request()->all();
        $data['image'] = $this->saveImage($request);

        $result = $news->fill($data)->save();
        if($result) {
            return redirect()->route('news.show', $news->id)->with('success', 'New has been changed!');
        }
        else {
            return redirect()->route('admin.news.create')->with('error', 'Changing of new finished with mistake!');
        }
    }

    //удаляем новость, laravel из модели сам разруливает id-шники
    public function destroy(News $news) {
       $news->delete();
       return redirect()->route('admin.news.index')->with('success', 'New has been deleted successfully!');
    }

    public function store(Request $request) {
            $news = new News();
            $this->validate($request, News::rules(), [], News::attrNames());
            $data = request()->all();
            $data['image'] = $this->saveImage($request);

            $result = $news->fill($data)->save();
            if($result) {
                return redirect()->route('news.show', $news->id)->with('success', 'New has been added!');
            }
            else {
                return redirect()->route('admin.news.create')->with('error', 'Adding a new finished with mistake!');
            }
}
}
