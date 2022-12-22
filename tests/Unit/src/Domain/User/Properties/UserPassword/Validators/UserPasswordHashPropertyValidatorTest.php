<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserPassword\Validators;

use Src\Domain\User\Properties\UserPassword\Validators\UserPasswordHashPropertyValidator\UserPasswordHashPropertyValidator;
use Src\Domain\User\Properties\UserPassword\Validators\UserPasswordHashPropertyValidator\UserPasswordHashWrongFormatException;
use Tests\TestCase;
use Tests\Unit\src\SharedDummy\Properties\User\UserPasswordDummy;

class UserPasswordHashPropertyValidatorTest extends TestCase
{
    /**
     * @throws UserPasswordHashWrongFormatException
     */
    public function test_valid(): void
    {
        $value = hash('sha512', '2');

        $sut = new UserPasswordHashPropertyValidator(new UserPasswordDummy($value));

        $sut->validate();

        $this->assertTrue(true);
    }

    public function test_invalid(): void
    {
        $this->expectException(UserPasswordHashWrongFormatException::class);

        $sut = new UserPasswordHashPropertyValidator(new UserPasswordDummy('1'));

        $sut->validate();
    }
}
