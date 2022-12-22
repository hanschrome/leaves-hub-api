<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserEmail\Validators;

class UserEmailRegexPropertyValidatorDataProviderTest
{
    public function test_value_without_exception(): array
    {
        return [
            ['micorreo@gmail.com'],
            ['micorreo2@gmail.com'],
            ['mi.correo2@gmail.com'],
            ['mi.c_orreo2@gmail.com'],
            ['mi.c_orreo2@hotmail.com'],
        ];
    }

    public function test_value_with_exception(): array
    {
        return [
            ['fakemail'],
            ['email@fake'],
            ['email@'],
            ['emai....l@gmail.com'],
            ['emai....l@gmail..com'],
            ['email@@correo.com'],
        ];
    }
}
