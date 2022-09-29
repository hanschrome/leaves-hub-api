<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus;

interface IUserAccountRecoveryStatus
{
    public function __construct(int $status);

    public function value(): int;
}
