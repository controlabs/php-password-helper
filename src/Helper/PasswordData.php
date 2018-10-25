<?php

namespace Controlabs\Helper;

class PasswordData
{
    private $password;
    private $salt;

    public function __construct(string $password, string $salt)
    {
        $this->password = $password;
        $this->salt = $salt;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function salt(): string
    {
        return $this->salt;
    }
}
