<?php

namespace App\Services;
use App\Category;
use App\News;


class XMLParserService
{
    public function saveNews($link) {
        $xml = XmlParser::load('https://news.yandex.ru/sport.rss');
        dump($xml);
        $data = $xml->parse([
        'title' => ['uses' => 'channel.title'],
        'link' => ['uses' => 'channel.link'],
        'description' => ['uses' => 'channel.description'],
        'image' => ['uses' => 'channel.image.url'],
        'news' => ['uses' => 'channel.item[guid,title, link,description,pubDate,enclosure::url,category]'],
    ]);
    dump($data);

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
        return redirect()->route('news.category.index');
    }
}
