<?php

namespace SolrAPI;

use Solarium\Client;

class SolrRequester
{

    /** @var Solarium\Client */
    protected $client;

    public function __construct()
    {
        $config = array(
            'endpoint' => array(
                'localhost' => array(
                    'host' => '127.0.0.1',
                    'port' => 8983,
                    'path' => '/',
                    'core' => 'films',
                    // For SolrCloud you need to provide a collection instead of core:
                    // 'collection' => 'techproducts',
                    // Set the `hostContext` for the Solr web application if it's not the default 'solr':
                    // 'context' => 'solr',
                )
            )
        );
        $this->client = new Client($adapter, $eventDispatcher, $config);
    }

    public function sendRequest(): array
    {
        // get a select query instance
        $query = $this->client->createQuery($this->client::QUERY_SELECT);

        // this executes the query and returns the result
        $resultset = $this->client->execute($query);

        $films = [];
        foreach ($resultset as $document) {
            $films[] = new Film(
                $document->id,
                $document->name,
                $document->genre,
                $document->age_rating,
                $document->actors
            );
        }

        return $films;
    }
}
