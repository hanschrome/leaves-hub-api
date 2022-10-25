<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserCreatedAt\Validators;

use Tests\TestCase;

class UserCreatedAtTimestampPropertyValidatorTest extends TestCase
{

    public function test_Validate_Now_ShouldNotThrowException()
    {

    }

    public function test_Validate_NegativeValue_ShouldThrowException()
    {

    }
}
