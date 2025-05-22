<?php

namespace Source\Models\Salle;

use DateTime;

class Payment {
    private ?int $id;
    private ?float $amount;
    private ?string $method;
    private ?string $status;
    private ?DateTime $date;

    public function __construct(
        int $id = null,
        float $amount = null,
        string $method = null,
        string $status = null,
        DateTime $date = null
    ) {
        $this->id = $id;
        $this->amount = $amount;
        $this->method = $method;
        $this->status = $status;
        $this->date = $date;
    }

    public function getId(): ?int 
    { 
        return $this->id; 
    }
    public function getAmount(): ?float 
    { 
        return $this->amount; 
    }
    public function getMethod(): ?string 
    { 
        return $this->method; 
    }
    public function getStatus(): ?string 
    { 
        return $this->status; 
    }
    public function getDate(): ?DateTime 
    { 
        return $this->date; 
    }

    public function setId(int $id): void 
    { 
        $this->id = $id; 
    }
    public function setAmount(float $amount): void 
    { 
        $this->amount = $amount; 
    }
    public function setMethod(string $method): void 
    { 
        $this->method = $method; 
    }
    public function setStatus(string $status): void 
    { 
        $this->status = $status; 
    }
    public function setDate(DateTime $date): void 
    { 
        $this->date = $date; 
    }
}
