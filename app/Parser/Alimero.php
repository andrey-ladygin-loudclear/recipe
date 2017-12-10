<?php

namespace App\Parser;

use App\Models\Parse\ParsedIngredients;
use App\Models\Parse\ParsedRecipes;
use App\Models\Parse\ParsedSites;
use Symfony\Component\DomCrawler\Crawler;

class Alimero extends Parser
{
    protected $domain = 'http://alimero.ru';
    protected $baseUrl = 'http://alimero.ru/kuhnya-mira';
    protected $parsed_count = 0;

    public function run()
    {
        $this->parse_page($this->baseUrl);
        echo "\n Parsed: {$this->parsed_count} pages";
    }

    public function parse_page($url)
    {
        $this->parsed_count++;
        $crawler = $this->client->request('GET', $url);

        if($crawler->filterXPath('//div[@class="content-wrapper content-wrapper_article-content"]')->count())
        {
            $this->parse_recipe($crawler, $url);
        }

        $crawler->filterXPath('//div[@class="list-topic__title"]')->each(function (Crawler $node, $i) {
            $link = $node->filterXPath('//a')->attr('href');
            $url = $this->domain.$link;

            $count = 0;//ParsedSites::where('url', '=', $url)->count();

            echo "Parse Page {$url}, {$count}\n";

            if(!$count)
            {
                $this->parse_page($url);

                ParsedSites::create([
                    'url' => $url
                ]);
            }
        });

    }

    protected function parse_recipe(Crawler $node, $url)
    {
        $title = $node->filterXPath('//div[@class="row article-title"]')->filterXPath('//h1')->text();

        $title_count = ParsedRecipes::where('link', '=', $url)->count();

        if($title_count)
        {
            echo "Recipe Already exists\n";
            return;
        }

        $img = $node->filterXPath('//div[@class="article-head-image"]')->filterXPath('//img')->attr('src');
        $descriptionNode = $node->filterXPath('//div[@class="row article-content article-content_with_instruction-paragraph"]')->children()->nextAll();
        $description = $descriptionNode->text();
        $descriptionHTML = $descriptionNode->html();

        $parsed_recipe = ParsedRecipes::create([
            'name' => $title,
            'link' => $url,
            'preview' => $img,
            'description' => $description,
            'html' => 'http:'.$descriptionHTML,
        ]);

        echo "Recipe Added: {$parsed_recipe->id}\n";

        $ingredientsNode = $node->filterXPath('//ul[@class="block-list block-list_ingredients"]');

        $this->parse_ingredients($ingredientsNode, $parsed_recipe->id);
    }

    protected function parse_ingredients(Crawler $node, $recipe_id)
    {
        $node->filterXPath('//li[@class="ingredient"]')->each(function(Crawler $node, $i) use ($recipe_id) {
            $ingredient = ParsedIngredients::create([
                'parsed_recipe_id' => $recipe_id,
                'name' => $node->text(),
                'quantity' => ''
            ]);

            echo "Ingredient Added: {$ingredient->id}\n";
        });

    }
}
