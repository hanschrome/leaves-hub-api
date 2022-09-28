<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery;

use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;

interface IUserAccountRecovery
{
    public function __construct(IUserAccountRecoveryId $userAccountRecoveryId);
}
