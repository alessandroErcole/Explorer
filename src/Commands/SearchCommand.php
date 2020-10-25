<?php

namespace JeroenG\Explorer\Commands;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;
use Laravel\Scout\Searchable;

class SearchCommand extends Command
{
    protected $signature = 'elastic:search
                            {model : Class name of model to bulk import}
                            {term : What to search for}';

    protected $description = 'Search through a particular index.';

    public function handle(): int
    {
        /** @var Searchable $class */
        $class = $this->argument('model');

        $term = $this->argument('term');

        $response = $class::search($term);

        dump($response->get());

        return 0;
    }
}