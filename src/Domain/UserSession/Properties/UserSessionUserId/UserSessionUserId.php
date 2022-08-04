<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionUserId;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\UserSession\Properties\USerSessionUserId\Validators\UserSessionUserIdValidator;

class UserSessionUserId extends AbstractProperty implements IProperty, IUserSessionUserId
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
        $this->addValidator(new UserSessionUserIdValidator($this));
        $this->executeValidators();
    }

    public function value(): string
    {
        return $this->value;
    }
}
