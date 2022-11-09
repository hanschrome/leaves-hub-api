<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryDueDate;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;

class UserAccountRecoveryDueDate extends AbstractTimestampProperty implements IProperty, IUserAccountRecoveryDueDate
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
