<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserEmail\Validators;

use Src\Domain\User\Properties\UserEmail\Validators\UserEmailRegexPropertyValidator\UserEmailPropertyWrongFormatException;
use Src\Domain\User\Properties\UserEmail\Validators\UserEmailRegexPropertyValidator\UserEmailRegexPropertyValidator;
use Tests\TestCase;

class UserEmailRegexPropertyValidatorTest extends TestCase
{
    /**
     * @dataProvider Tests\Unit\src\Domain\User\Properties\UserEmail\Validators\UserEmailRegexPropertyValidatorDataProviderTest::test_value_without_exception
     * @throws UserEmailPropertyWrongFormatException
     */
    public function test_valid(string $email): void
    {
        $sut = new UserEmailRegexPropertyValidator(new DummyEmailIProperty($email));

        $sut->validate();

        $this->assertTrue(true);
    }

    /**
     * @dataProvider Tests\Unit\src\Domain\User\Properties\UserEmail\Validators\UserEmailRegexPropertyValidatorDataProviderTest::test_value_with_exception
     */
    public function test_exception(string $email): void
    {
        $this->expectException(UserEmailPropertyWrongFormatException::class);

        $sut = new UserEmailRegexPropertyValidator(new DummyEmailIProperty($email));

        $sut->validate();
    }
}
