<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserCreatedAt\Validators;

use Src\Domain\User\Properties\UserCreatedAt\Validators\UserCreatedAtTimestampPropertyRangeException;
use Src\Domain\User\Properties\UserCreatedAt\Validators\UserCreatedAtTimestampPropertyValidator;
use Tests\TestCase;
use Tests\Unit\src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\DummyIProperty;

class UserCreatedAtTimestampPropertyValidatorTest extends TestCase
{

    /**
     * @throws UserCreatedAtTimestampPropertyRangeException
     */
    public function test_Validate_Now_ShouldNotThrowException()
    {
        $sut = new UserCreatedAtTimestampPropertyValidator(
            new DummyIProperty(now()->getTimestamp())
        );

        $sut->validate();

        $this->assertTrue(true);
    }

    public function test_Validate_NegativeValue_ShouldThrowException()
    {
        $this->expectException(UserCreatedAtTimestampPropertyRangeException::class);

        $sut = new UserCreatedAtTimestampPropertyValidator(
            new DummyIProperty(-1)
        );

        $sut->validate();
    }
}
