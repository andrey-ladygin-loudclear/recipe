<?php

namespace App\Console\Commands;

use App\Model\ParsedRecipes;
use Goutte\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class ParseRecipes extends Command
{
    private $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:recipes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse Recipes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->client = new Client();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $crawler = $this->client->request('GET', 'http://ivona.bigmir.net/cooking/recipes?p=1');

        $crawler->filterXPath('//li[@class="b-prev-articles__list-item g-clearfix"]')->each(function(Crawler $node, $i) {
            $href = $node->children()->first()->attr('href');
            $title = $node->filterXPath('//h5')->children()->first()->text();
            $image = $node->children()->first()->children()->first()->attr('src');

//            $title = $node->filterXPath('//h5')->children()->text();
//            $image = $node->children()->children()->attr('src');

//            ParsedRecipes::create([
//                'name' => $title,
//                'link' => $href,
//                'preview' => $image,
//            ]);
        });
    }
}
