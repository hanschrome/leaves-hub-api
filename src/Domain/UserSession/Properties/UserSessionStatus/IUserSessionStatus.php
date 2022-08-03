<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionStatus;

interface IUserSessionStatus
{
    const STATUS_VALID = 1;
    const STATUS_EXPIRED = 2;
    const STATUS_DECLINED = 3;

    const STATUS_ALL = [
        self::STATUS_VALID,
        self::STATUS_EXPIRED,
        self::STATUS_DECLINED
    ];

    public function value(): int;
}
