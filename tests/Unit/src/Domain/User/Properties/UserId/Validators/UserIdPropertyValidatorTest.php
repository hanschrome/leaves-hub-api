<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserId\Validators;

use Src\Domain\User\Properties\UserId\Validators\Uuid\UserIdPropertyValidator;
use Src\Domain\User\Properties\UserId\Validators\Uuid\UserIdPropertyWrongFormatException;
use Tests\TestCase;
use Tests\Unit\src\SharedDummy\Properties\User\UserIdDummy;

class UserIdPropertyValidatorTest extends TestCase
{
    /**
     * @throws UserIdPropertyWrongFormatException
     */
    public function test_valid(): void
    {
        $sut = new UserIdPropertyValidator(new UserIdDummy('397c333b-5deb-4375-b599-548ed2711f63'));

        $sut->validate();

        $this->assertTrue(true);
    }

    public function test_invalid(): void
    {
        $this->expectException(UserIdPropertyWrongFormatException::class);

        $sut = new UserIdPropertyValidator(new UserIdDummy('1'));

        $sut->validate();
    }
}
