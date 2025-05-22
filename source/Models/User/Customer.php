<?php

namespace Source\Models\User;

class Customer extends User
{
    public function __construct(
        int $id = null,
        int $idType = null,
        string $name = null,
        string $email = null,
        string $password = null,
        string $photo = null,
        string $address = null,
        string $phone = null
    ) {
        parent::__construct($id, $idType, $name, $email, $password, $photo, $address, $phone);
    }
}
