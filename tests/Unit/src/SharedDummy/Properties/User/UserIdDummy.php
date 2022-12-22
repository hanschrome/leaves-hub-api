<?php

declare(strict_types=1);

namespace Tests\Unit\src\SharedDummy\Properties\User;

use Src\Domain\Properties\IProperty;

class UserIdDummy implements IProperty
{
    public string $userId;

    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        // TODO: Implement validate() method.
    }

    public function value()
    {
        return $this->userId;
    }
}
