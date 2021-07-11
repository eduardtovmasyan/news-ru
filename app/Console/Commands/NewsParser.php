<?php

namespace App\Console\Commands;

use News;
use Parser;
use Illuminate\Console\Command;
use App\Http\Controllers\ParserController;

class NewsParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing and saving news by Task Scheduling';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $parsedNews = Parser::parserGet();

        $news = News::multipleStore($parsedNews);
    }
}
