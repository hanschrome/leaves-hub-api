<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserEmailVerifiedAt\Validators;

use Src\Domain\User\Properties\UserEmailVerifiedAt\Validators\UserVerifiedAtTimestampPropertyValidator\UserVerifiedAtTimestampPropertyValidator;
use Src\Domain\User\Properties\UserEmailVerifiedAt\Validators\UserVerifiedAtTimestampPropertyValidator\UserVerifiedAtTimestampPropertyWrongRangeException;
use Tests\TestCase;
use Tests\Unit\src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\DummyIProperty;

class UserVerifiedAtTimestampPropertyValidatorTest extends TestCase
{

    /**
     * @throws UserVerifiedAtTimestampPropertyWrongRangeException
     */
    public function test_valid(): void
    {
        $sut = new UserVerifiedAtTimestampPropertyValidator(new DummyIProperty(now()->timestamp));

        $sut->validate();

        $this->assertTrue(true);
    }

    public function test_invalid(): void
    {
        $this->expectException(UserVerifiedAtTimestampPropertyWrongRangeException::class);

        $sut = new UserVerifiedAtTimestampPropertyValidator(new DummyIProperty(-1));

        $sut->validate();
    }
}
