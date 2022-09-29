<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoverySecretCode;

interface IUserAccountRecoverySecretCode
{
    public function __construct(string $secretCode);

    public function value(): string;
}
