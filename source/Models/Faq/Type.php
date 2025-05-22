<?php

namespace Source\Models\Faq;

class Type 
{
    private $id;
    private $type;

    public function __construct(int $id, string $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    public function getId() : ?int 
    {
        return $this->id;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setId(int $id) : void 
    {
        $this->id = $id;
    }

    public function setType(string $type) : void 
    {
        $this->type = $type;
    }
}