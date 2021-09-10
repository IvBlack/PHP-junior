<?php

namespace App\Services;
use App\Category;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

use Laravie\Parser\Xml\Reader;
use Laravie\Parser\Xml\Document;


class XMLParserService
{
    public function saveNews($rssLink) {
        //$rss = 'https:://news.yandex.ru/martial_arts.rss';
        $xml = @simplexml_load_file($rssLink);
        if($xml===false)die('Error connect to RSS, try again.');


        foreach($xml->xpath('//item') as $item){
            echo '<pre>';
            echo ''.$item->title.'('.$item->pubDate.')';
            echo '</br>';
            echo ''.$item->description.'';
            echo ''.$item->link.'';
            echo '</pre>';
        }

        /*$xmlstr = @file_get_contents($link);
        if($xmlstr===false)die('Error connect to URL: '.$xmlstr);

        $xml = new SimpleXMLElement($xmlstr);
        if($xml===false)die('Error connect to RSS: '.$xmlstr);
        dump($xml);*/



        //$xml = XmlParser::extract($link);
        /*$data = $xml->parse([
        'title' => ['uses' => 'channel.title'],
        'link' => ['uses' => 'channel.link'],
        'description' => ['uses' => 'channel.description'],
        'image' => ['uses' => 'channel.image.url'],
        'news' => ['uses' => 'channel.item[guid,title,link,description,pubDate,enclosure::url,category]'],
    ]);

    dump($data);*/

        /*foreach ($data['news'] as $news) {
            if($news['category']) {
                $category = Category::query()->firstOrCreate([
                    'name' => $news['category'],
                    'slug' => Str::slug($news['category']),
                ]);

                News::query()->firstOrCreate([
                    'title' => $news['title'],
                    'text' => $news['description'],
                    'isPrivate' => false,
                    'image' => $news['enclosure::url'],
                    'category_id' => $category->id,
                ]);
            }
        }*/
        //return redirect()->route('news.category.index');
    }
}
