<?php
use SolrAPI\SolrRequester;

require_once '../vendor/autoload.php';

$solrRequester = new SolrRequester();
$films = $solrRequester->addFilms();

