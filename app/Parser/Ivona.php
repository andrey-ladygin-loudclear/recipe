<?php

namespace App\Parser;

use App\Models\Parse\ParsedIngredients;
use App\Models\Parse\ParsedRecipes;
use App\Models\Parse\ParsedSites;
use Symfony\Component\DomCrawler\Crawler;

class Ivona extends Parser
{
    protected $baseUrl = 'http://ivona.bigmir.net/cooking/recipes';
    private $to = 1035;

    public function run()
    {
        for($page = 1; $page < $this->to; $page++)
        {
            $get_url = "{$this->baseUrl}?p={$page}";
            $count = ParsedSites::where('url', '=', $get_url)->count();

            $this->info("$page of $this->to, $get_url = $count");

            if (!$count)
            {
                $crawler = $this->client->request('GET', $get_url);

                $crawler->filterXPath('//li[@class="b-prev-articles__list-item g-clearfix"]')->each(function (Crawler $node, $i) {
                    $href = $node->children()->first()->attr('href');
                    $title = $node->filterXPath('//h5')->children()->first()->text();
                    $image = $node->children()->first()->children()->first()->attr('src');

                    //$title = $node->filterXPath('//h5')->children()->text();
                    //$image = $node->children()->children()->attr('src');

                    $title_count = ParsedRecipes::where('name', '=', $title)->count();
                    //$this->info("$title, $title_count");

                    if(!$title_count) {
                        $parsed_recipe = ParsedRecipes::create([
                            'name' => $title,
                            'link' => 'http:'.$href,
                            'preview' => 'http:'.$image,
                        ]);

                        $this->parsePageWithRecipe($parsed_recipe);
                    }
                });

                ParsedSites::create([
                    'url' => $get_url
                ]);
            }
        }
    }

    public function parsePageWithRecipe($parsed_recipe)
    {
        $this->info("Parse ingredients id: {$parsed_recipe->id}, link: {$parsed_recipe->link}");

        //<li class="b-ingredients__list-item g-clearfix">
        $crawler = $this->client->request('GET', $parsed_recipe->link);
        $crawler->filterXPath('//li[@class="b-ingredients__list-item g-clearfix"]')->each(function(Crawler $node, $i) use ($parsed_recipe) {

            $parts = explode("\n", $node->text());

            $name = trim($parts[0]. ' ' . $parts[1]);
            $uantity = trim($parts[2]. ' ' . $parts[3]);

            ParsedIngredients::create([
                'parsed_recipe_id' => $parsed_recipe->id,
                'name' => $name,
                'quantity' => $uantity
            ]);
        });

        $description = '';

        $crawler->filterXPath('//div[@class="b-article__text _articleContent"]')
            ->filterXPath('//p')->each(function(Crawler $node, $i) use (&$description) {
                if(!$node->attr('class'))
                {
                    $description .= $node->text()." ";
                }
            });

        ParsedRecipes::where('id', $parsed_recipe->id)->update(['description' => $description]);
    }
}
