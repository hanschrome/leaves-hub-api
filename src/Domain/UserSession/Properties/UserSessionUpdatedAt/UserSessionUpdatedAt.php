<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionUpdatedAt;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\UserSession\Properties\UserSessionUpdatedAt\Validators\UserSessionUpdateAtValidator;

class UserSessionUpdatedAt extends AbstractTimestampProperty implements IProperty, IUserSessionUpdatedAt
{
    private ?int $timestamp;

    public function __construct(?int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        $this->addValidator(new UserSessionUpdateAtValidator($this));
        $this->executeValidators();
    }

    public function value(): ?int
    {
        return $this->timestamp;
    }
}
