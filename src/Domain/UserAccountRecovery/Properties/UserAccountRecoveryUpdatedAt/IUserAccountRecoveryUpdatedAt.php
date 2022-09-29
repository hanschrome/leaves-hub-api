<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryUpdatedAt;

interface IUserAccountRecoveryUpdatedAt
{
    public function __construct(int $timestamp);

    public function value(): int;
}
