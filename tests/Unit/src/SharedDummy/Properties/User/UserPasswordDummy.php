<?php

declare(strict_types=1);

namespace Tests\Unit\src\SharedDummy\Properties\User;

use Src\Domain\Properties\IProperty;

class UserPasswordDummy implements IProperty
{
    private string $hash;

    public function __construct(string $hash)
    {
        $this->hash = $hash;
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
        return $this->hash;
    }
}
