<?php

namespace Source\Models\Faq;

class FAQManager
{
    private array $questions = [];

    public function addQuestion(Question $question): void
    {
        $this->questions[] = $question;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }
}