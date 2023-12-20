<?php

class User
{
private int $id;
private string $name;
private string $rolle;

    /**
     * @param int $id
     * @param string $name
     * @param string $rolle
     */
    public function __construct(int $id, string $name, string $rolle)
    {
        $this->id = $id;
        $this->name = $name;
        $this->rolle = $rolle;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRolle(): string
    {
        return $this->rolle;
    }

    public function setRolle(string $rolle): void
    {
        $this->rolle = $rolle;
    }


}