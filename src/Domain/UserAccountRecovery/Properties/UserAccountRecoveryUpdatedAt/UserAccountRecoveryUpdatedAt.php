<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryUpdatedAt;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;

class UserAccountRecoveryUpdatedAt extends AbstractTimestampProperty implements IProperty, IUserAccountRecoveryUpdatedAt
{
    private int $timestamp;

    public function __construct(?int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function value(): int
    {
        return $this->timestamp;
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }
}
