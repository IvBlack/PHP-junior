<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;

class CutUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $shortLinks = ShortLink::latest()->get();
        return view('shortenLink', compact('shortLinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function shortenLink($solt) {
        $find = ShortLink::where('solt', $solt)->first();
        return redirect($find->link);
    }

    public function store(Request $request) {
        $request->validate(['link' => 'required|url']);

        //уникальная ссылка для url
        $letters = 'qwertyuiopasdfghjklzxcvbnm1234567890';
        $url_id = substr(str_shuffle($letters), 0, 4);

        //собираем ссылку
        $input['link'] = $request->link;
        $input['solt'] = $url_id;

        $result = ShortLink::create($input);
        if($result) {
            return redirect('cut-the-url')->with('success', 'Your abbreviated URL below.');
        }
        else {
            return redirect('cut-the-url')->with('error', 'Type URL correctly!');
        }
    }
}
