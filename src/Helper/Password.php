<?php

namespace Controlabs\Helper;

class Password
{
    protected const SHA_512 = 'sha512';

    public function encrypt(string $password, string $salt = null, string $algorithm = self::SHA_512): PasswordData
    {
        if (!$salt) {
            $salt = hash($algorithm, uniqid(mt_rand(1, mt_getrandmax()), true));
        }

        $password = hash($algorithm, $password . $salt);

        return new PasswordData($password, $salt);
    }

    public function verify(string $encrypted, string $password, string $salt, string $algorithm = self::SHA_512): bool
    {
        return $encrypted === $this->encrypt($password, $salt, $algorithm)->password();
    }
}
