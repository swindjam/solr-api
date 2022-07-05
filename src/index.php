<?php
use SolrAPI\SolrRequester;

require_once '../vendor/autoload.php';

$solrRequester = new SolrRequester();
$films = $solrRequester->getFilms();

echo json_encode([
    'films' => array_map(
        fn(SolrAPI\Film $film) => [
            'id' => $film->getId(),
            'name' => $film->getName(),
            'genre' => $film->getGenre(),
            'age_rating' => $film->getAgeRating(),
            'actors' => $film->getActors(),
        ], 
        $films
    )
]);
