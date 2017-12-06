<?php

namespace App\Console\Commands;

use App\Models\ParsedRecipes;
use App\Models\ParsedSites;
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
    	$url = 'http://ivona.bigmir.net/cooking/recipes';
    	$page = 1;
    	$to = 1035;

    	for($page = 1; $page < $to; $page++)
		{
			$get_url = "{$url}?p={$page}";
			$count = ParsedSites::where('url', '=', $get_url)->count();

			$this->info("$page of $to, $get_url = $count");

			if (!$count)
			{
				$crawler = $this->client->request('GET', $get_url);

				$crawler->filterXPath('//li[@class="b-prev-articles__list-item g-clearfix"]')->each(function (Crawler $node, $i) {
					$href = $node->children()->first()->attr('href');
					$title = $node->filterXPath('//h5')->children()->first()->text();
					$image = $node->children()->first()->children()->first()->attr('src');

//					$title = $node->filterXPath('//h5')->children()->text();
//					$image = $node->children()->children()->attr('src');

					$title_count = ParsedRecipes::where('name', '=', $title)->count();
//					$this->info("$title, $title_count");

					if(!$title_count) {
						ParsedRecipes::create([
							'name' => $title,
							'link' => 'http:'.$href,
							'preview' => 'http:'.$image,
						]);
					}
				});

				ParsedSites::create([
					'url' => $get_url
				]);
			}
		}
    }
}
