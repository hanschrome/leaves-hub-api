<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod;

interface IUserAccountRecoveryMethod
{
    public function __construct(int $method);

    public function value(): int;
}
