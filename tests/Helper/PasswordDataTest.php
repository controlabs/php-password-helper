<?php

namespace Controlabs\Tests\Helper;

use Controlabs\Helper\PasswordData;
use PHPUnit\Framework\TestCase;

class PasswordDataTest extends TestCase
{
    public function testPasswordData()
    {
        $data = new PasswordData('password_test', 'salt_test');

        $this->assertSame('password_test', $data->password());
        $this->assertSame('salt_test', $data->salt());
    }
}
