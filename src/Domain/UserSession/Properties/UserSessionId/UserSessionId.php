<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionId;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\UserSession\Properties\UserSessionId\Validator\UserSessionIdValidator;

class UserSessionId extends AbstractProperty implements IProperty, IUserSessionId
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function sanitize(): void
    {
        $this->value = trim($this->value);
    }

    public function validate(): void
    {
        $this->addValidator(new UserSessionIdValidator($this));
        $this->executeValidators();
    }

    public function value(): string
    {
        return $this->value;
    }
}
