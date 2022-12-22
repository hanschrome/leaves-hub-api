<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserId;

use Src\Domain\User\Properties\UserId\UserId;
use Src\Domain\User\Properties\UserId\Validators\Uuid\UserIdPropertyWrongFormatException;
use Tests\TestCase;

class UserIdTest extends TestCase
{
    public function test_valid(): void
    {
        $sut = new UserId('397c333b-5deb-4375-b599-548ed2711f63');

        $sut->validate();

        $this->assertTrue(true);
    }

    public function test_invalid(): void
    {
        $this->expectException(UserIdPropertyWrongFormatException::class);

        $sut = new UserId('asd');

        $sut->validate();
    }
}
