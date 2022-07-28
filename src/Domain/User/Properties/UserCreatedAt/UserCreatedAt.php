<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserCreatedAt;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;

class UserCreatedAt extends AbstractTimestampProperty implements IProperty, IUserCreatedAt
{
    private int $timestamp;

    public function __construct(?int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function sanitize(): void
    {
        // --
    }

    public function value(): int
    {
        return $this->timestamp;
    }
}
