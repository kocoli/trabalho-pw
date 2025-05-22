<?php

namespace Source\Models\Faq;

class Question 
{
    //atributos
    private $id;
    private $idType;
    private $question;
    private $answer;

    //construtor
    public function __construct(
        int $id = null,
        int $idType = null,
        string $question = null,
        string $answer = null
    )
    {
        $this->id = $id;
        $this->idType = $idType;
        $this->question = $question;
        $this->answer = $answer;
    }

    //getters
    public function getId() : ?int
    {
        return $this->id;
    }

    public function getIdType() : ?int
    {
        return $this->idType;
    }

    public function getQuestion() : ?string
    {
        return $this->question;
    }

    public function getAnswer() :?string
    {
        return $this->answer;
    }

    //setters
    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function setIdType(int $idType) : void
    {
        $this->idType = $idType;
    }

    public function setQuestion(string $question) : void
    {
        $this->question = $question;
    }

    public function setAnswer(string $answer) : void
    {
        $this->answer = $answer;
    }
}