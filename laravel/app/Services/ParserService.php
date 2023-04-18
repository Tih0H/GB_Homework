<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade;

class ParserService implements Parser
{
    private string $link;
    private array $load;

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function getParseData(): array
    {
        $xml = Facade::load($this->link);
        $this->load = $xml->parse([
            "title" => [
                "uses" => "channel.title"
            ],
            "link" => [
                "uses" => "channel.link"
            ],
            "description" => [
                "uses" => "channel.description"
            ],
            "image" => [
                "uses" => "channel.image.url"
            ],
            "news" => [
                "uses" => "channel.item[title,link,guid,description,pubDate,author,category]"
            ]
        ]);
        return $this->load;
    }

    public function saveParseDataToDb(): void
    {
        if (!empty($this->load['news'])) {
            foreach ($this->load['news'] as $item) {
                if (!News::query()->where('guid', $item['guid'])->first()) {
                    $news = News::create($item);
                    if ($news) {
                        $category = Category::query()->where('title', $item['category'])->first();
                        if (!$category) {
                            $category = Category::create(['title' => $item['category']]);
                        }
                        $news->categories()->attach($category);
                    }
                }
            }
        }

    }


}
