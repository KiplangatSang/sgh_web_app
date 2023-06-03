<?php

namespace App\Console\Commands;

use App\Http\APIPosts\FetchNewsContract;
use App\Http\Controllers\ExternalNewsController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $fetchNewsContract;

    public function __construct(FetchNewsContract $fetchNewsContract)
    {
        parent::__construct();
        $this->fetchNewsContract = $fetchNewsContract;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    $newscontroller =  new ExternalNewsController();
    $newscontroller->create($this->fetchNewsContract);
    }
}
