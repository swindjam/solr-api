<?php

namespace SolrAPI;

use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;


class SolrRequester
{

    /** @var Solarium\Client */
    protected $client;

    public function __construct()
    {
        $config = [
            'endpoint' => [
                'localhost' => [
                    'host' => 'solr.local',
                    'port' => 8983,
                    'path' => '/',
                    'context' => 'solr',
                    'collection' => 'films',
                ]
            ]
        ];
        $adapter = new Curl();
        $dispatcher = new EventDispatcher();
        $this->client = new Client($adapter, $dispatcher, $config);
    }

    public function getFilms(): array
    {
        $query = $this->client->createSelect();

        $resultSet = $this->client->execute($query);

        $films = [];
        $documents = $resultSet->getDocuments();
        foreach ($documents as $document) {
            var_dump($document);
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

    public function addFilms(): void
    {
        $query = $this->client->createUpdate();

        $doc1 = $query->createDocument();
        $doc1->id = 1;
        $doc1->name = 'Die Hard';
        $doc1->genre = 'Action';
        $doc1->age_rating = 18;
        $doc1->actors = ['Bruce Willis', 'Alan Rickman'];
        
        $query->addDocuments([$doc1]);
        $query->addCommit();

        $result = $this->client->update($query);
    }
}
