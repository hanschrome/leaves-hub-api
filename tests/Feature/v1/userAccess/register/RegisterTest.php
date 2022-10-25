<?php

declare(strict_types=1);

namespace Tests\Feature\v1\userAccess\register;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * @return void
     * @dataProvider registerProvider
     */
    public function test_register(string $email, array $expected)
    {
        /**
         * @todo
         */
    }

    public function registerProvider(): array
    {
        return [
            ['email' => 'testmail@gmail.com', 'expected' => ['error_code' => null, 'is_success' => 'true']]
        ];
    }
}