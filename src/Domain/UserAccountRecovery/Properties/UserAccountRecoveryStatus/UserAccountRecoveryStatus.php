<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus;

class UserAccountRecoveryStatus implements IUserAccountRecoveryStatus
{
    public const STATUS_VALID = 1;
    public const STATUS_USED = 2;
    public const STATUS_EXPIRED = 3;

    public const STATUSES = [
        self::STATUS_VALID,
        self::STATUS_USED,
        self::STATUS_EXPIRED
    ];

    private int $status;

    public function __construct(int $status)
    {
        $this->status = $status;
    }

    public function value(): int
    {
        return $this->status;
    }
}
