<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserCreatedAt;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;
use Src\Domain\User\Properties\UserCreatedAt\UserCreatedAt;
use Tests\TestCase;

class UserCreatedAtTest extends TestCase
{

    public function test_validate(): void
    {
        $sut = new UserCreatedAt(now()->getTimestamp());

        $sut->validate();

        $this->assertTrue(true);
    }

    public function test_value(): void
    {
        $timestamp = now()->getTimestamp();

        $sut = new UserCreatedAt($timestamp);

        $this->assertEquals($timestamp, $sut->value());
    }

    public function test_validate_throw_exception(): void
    {
        $this->expectException(IPropertyException::class);

        $sut = new UserCreatedAt(-1);

        $sut->validate();
    }

    public function test_value_throw_exception(): void
    {
        $this->expectException(IPropertyException::class);

        $sut = new UserCreatedAt(-1);

        $sut->validate();
    }

}
