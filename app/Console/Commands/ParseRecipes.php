<?php

namespace App\Console\Commands;

use App\Models\Parse\ParsedRecipes;
use App\Models\Parse\ParsedSites;
use App\Models\Parse\ParsedIngredients;
use App\Parser\Alimero;
use App\Parser\Ivona;
use Goutte\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class ParseRecipes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:recipes';

    private $parsers = [
//        Ivona::class,
        Alimero::class,
    ];

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse Recipes';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach($this->parsers as $parser)
        {
            (new $parser)->run();
        }
    }
}
