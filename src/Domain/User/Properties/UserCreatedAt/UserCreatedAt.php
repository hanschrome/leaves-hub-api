<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserCreatedAt;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\UserCreatedAt\Validators\UserCreatedAtTimestampPropertyValidator;

class UserCreatedAt extends AbstractTimestampProperty implements IProperty, IUserCreatedAt
{
    private int $timestamp;

    public function __construct(?int $timestamp)
    {
        $this->timestamp = $timestamp;
        $this->sanitize();
        $this->validate();
    }

    public function sanitize(): void
    {
        // --
    }

    public function validate(): void
    {
        $this->addValidator(new UserCreatedAtTimestampPropertyValidator($this));
        $this->executeValidators();
    }

    public function value(): int
    {
        return $this->timestamp;
    }
}
