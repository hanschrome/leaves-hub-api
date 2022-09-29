<?php

declare(strict_types=1);

namespace Src\Domain\UserACcountRecovery\Properties\UserAccountRecoveryDueDate;

interface IUserAccountRecoveryDueDate
{
    public function __construct(int $timestamp);

    public function value(): int;
}
