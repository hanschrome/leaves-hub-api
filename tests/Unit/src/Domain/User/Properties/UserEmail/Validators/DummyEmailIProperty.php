<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\User\Properties\UserEmail\Validators;

use Src\Domain\Properties\IProperty;

class DummyEmailIProperty implements IProperty
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function sanitize(): void
    {
        // do nothing
    }

    public function validate(): void
    {
        // do nothing
    }

    public function value()
    {
        return $this->value;
    }
}
