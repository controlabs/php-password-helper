<?php

namespace Controlabs\Tests\Helper;

use Controlabs\Helper\Password;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public function testPasswordHelper()
    {
        $helper = new Password();

        $data = $helper->encrypt('123');

        $this->assertTrue(
            $helper->verify($data->password(), '123', $data->salt())
        );
    }
}
