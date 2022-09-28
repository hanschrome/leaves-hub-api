<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId;

interface IUserAccountRecoveryId
{
    public function __construct(string $id);

    public function value(): string;
}
