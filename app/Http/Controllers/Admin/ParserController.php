<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index() {
        $xml = XmlParser::load('https://news.yandex.ru/sport.rss');
        dump($xml);
        $data = $xml->parse([
        'title' => ['uses' => 'channel.title'],
        'link' => ['uses' => 'channel.link'],
        'description' => ['uses' => 'channel.description'],
        'image' => ['uses' => 'channel.image.url'],
        'news' => ['uses' => 'channel.item[title, link,guide, description,pubDate]'],
    ]);
    dd($data);
    }
}
