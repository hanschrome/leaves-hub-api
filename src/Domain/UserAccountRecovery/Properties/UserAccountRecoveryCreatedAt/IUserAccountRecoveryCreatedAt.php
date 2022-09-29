<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryCreatedAt;

interface IUserAccountRecoveryCreatedAt
{
    public function __construct(?int $timestamp);

    public function value(): int;
}
