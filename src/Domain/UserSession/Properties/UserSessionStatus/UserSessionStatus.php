<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionStatus;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\UserSession\Properties\UserSessionStatus\Validators\UserSessionStatusValidator;

class UserSessionStatus extends AbstractProperty implements IProperty, IUserSessionStatus
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        $this->addValidator(new UserSessionStatusValidator($this));
        $this->executeValidators();
    }

    public function value(): int
    {
        return $this->value;
    }
}
