<?php

use SolrAPI/SolrRequester;

require_once __DIR__ . '/../vendor/autoload.php';

$solrRequester = new SolrRequester();
$films = $solrRequester->sendRequest();

var_dump($response);

echo json_encode([
    'films' => array_map(
        fn(Film $film) => [
            'id' => $film->getId(),
            'name' => $film->getName(),
            'genre' => $film->getGenre(),
            'age_rating' => $film->getAgeRating(),
            'actors' => $film->getActors(),
        ], 
        $films
    )
]);