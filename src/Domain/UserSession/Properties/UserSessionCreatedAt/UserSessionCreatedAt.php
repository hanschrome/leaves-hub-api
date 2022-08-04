<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionCreatedAt;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\UserSession\Properties\UserSessionCreatedAt\Validators\UserSessionCreatedAt\UserSessionCreatedAtTimestampValidator;

class UserSessionCreatedAt extends AbstractTimestampProperty implements IProperty, IUserSessionCreatedAt
{
    private int $timestamp;

    public function __construct(?int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function sanitize(): void
    {
        //
    }

    public function validate(): void
    {
        $this->addValidator(new UserSessionCreatedAtTimestampValidator($this));
        $this->executeValidators();
    }

    public function value(): int
    {
        return $this->timestamp;
    }
}
