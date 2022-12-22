<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserEmailVerifiedAt;

use Src\Domain\User\Properties\UserEmailVerifiedAt\UserEmailVerifiedAt;
use Src\Domain\User\Properties\UserEmailVerifiedAt\Validators\UserVerifiedAtTimestampPropertyValidator\UserVerifiedAtTimestampPropertyWrongRangeException;
use Tests\TestCase;

class UserEmailVerifiedAtTest extends TestCase
{
    public function test_valid(): void
    {
        $sut = new UserEmailVerifiedAt(now()->timestamp);

        $sut->validate();

        $this->assertTrue(true);
    }

    public function test_invalid(): void
    {
        $this->expectException(UserVerifiedAtTimestampPropertyWrongRangeException::class);

        $sut = new UserEmailVerifiedAt(-1);

        $sut->validate();
    }
}
