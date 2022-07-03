<?php

namespace SolrAPI;

class Film {

    protected $id;
    protected $name;
    protected $genre;
    protected $ageRating;
    protected $actors = [];

    public function __construct(string $id, string $name, string $genre, int $ageRating, array $actors)
    {
        $this->id = $id;
        $this->name = $name;
        $this->genre = $genre;
        $this->ageRating = $ageRating;
        $this->actors = $actors;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getAgeRating(): int
    {
        return $this->ageRating;
    }

    public function getActors(): array
    {
        return $this->actors;
    }

}