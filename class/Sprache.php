<?php

class Sprache
{
private int $id;
private string $sprachdatei;

    /**
     * @param int $id
     * @param string $sprachdatei
     */
    public function __construct(int $id, string $sprachdatei)
    {
        $this->id = $id;
        $this->sprachdatei = $sprachdatei;
    }

    public function getId(): int
    {
        return $this->id;
    }



    public function getSprachdatei(): string
    {
        return $this->sprachdatei;
    }




}