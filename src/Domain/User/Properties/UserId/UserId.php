<?php

namespace Src\Domain\User\Properties;

use Src\Domain\Properties\IProperty;

class UserId implements IProperty, IUserId
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
        $this->sanitize();
        $this->validate();
    }

    public function sanitize(): void
    {
        $this->value = trim($this->value);
    }

    public function validate(): void
    {
        // TODO: Implement validate() method.
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function value(): mixed
    {
        return $this->getValue();
    }
}
