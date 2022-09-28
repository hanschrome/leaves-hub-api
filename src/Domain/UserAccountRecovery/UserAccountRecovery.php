<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery;

use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;

class UserAccountRecovery implements IUserAccountRecovery
{
    private IUserAccountRecoveryId $userAccountRecoveryId;

    public function __construct(IUserAccountRecoveryId $userAccountRecoveryId)
    {
        $this->userAccountRecoveryId = $userAccountRecoveryId;
    }

    public function getId(): IUserAccountRecoveryId
    {
        return $this->userAccountRecoveryId;
    }
}
