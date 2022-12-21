<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserEmail;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Tests\TestCase;

class UserEmailTest extends TestCase
{
    /**
     * @dataProvider Tests\Unit\src\Domain\User\Properties\UserEmail\UserEmailDataProviderTest::test_value_without_exception
     */
    public function test_values(string $value): void
    {
        $sut = new UserEmail($value);

        $this->assertEquals($value, $sut->value());
    }

    /**
     * @dataProvider Tests\Unit\src\Domain\User\Properties\UserEmail\UserEmailDataProviderTest::test_value_with_exception
     */
    public function test_wrong_values(string $value): void
    {
        $this->expectException(IPropertyException::class);

        new UserEmail($value);
    }

    /**
     * @dataProvider Tests\Unit\src\Domain\User\Properties\UserEmail\UserEmailDataProviderTest::test_sanitize_value
     */
    public function test_sanitize_values(string $expected, string $value): void
    {
        $sut = new UserEmail($value);

        $this->assertEquals($expected, $sut->value());
    }
}
