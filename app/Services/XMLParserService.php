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

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rssLink);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $xmlresponse = curl_exec($ch);
        $xml=simplexml_load_string($xmlresponse);

        foreach($xml->xpath('//item') as $item){
            echo '<pre>';
            echo ''.$item->title.'('.$item->pubDate.')';
            echo '</br>';
            echo ''.$item->description.'';
            echo ''.$item->link.'';
            echo '</pre>';
        }

        /*for($i = 0; $i < 20; $i++) {
            $title = $xml->channel->item[$i]->title;
            $link = $xml->channel->item[$i]->link;
            $desc = $xml->channel->item[$i]->description;
            $html .="<div><h3>$title</h3>$link<br />$desc</div><hr>";
            }
            echo $html;*/

        /*
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https:://news.yandex.ru/auto.rss');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);

        curl_close($ch);

        $xml = simplexml_load_string($output);*/
        //$xml = simplexml_load_file();
        //if($xml===false)die('Error connect to RSS, try again.');


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
