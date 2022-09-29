<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery;

use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\IUserAccountRecoveryMethod;

class UserAccountRecovery implements IUserAccountRecovery
{
    private IUserAccountRecoveryId $userAccountRecoveryId;
    private IUserAccountRecoveryMethod $userAccountRecoveryMethod;

    public function __construct(
        IUserAccountRecoveryId $userAccountRecoveryId,
        IUserAccountRecoveryMethod $userAccountRecoveryMethod
    )
    {
        $this->userAccountRecoveryId = $userAccountRecoveryId;
        $this->userAccountRecoveryMethod = $userAccountRecoveryMethod;
    }

    public function getId(): IUserAccountRecoveryId
    {
        return $this->userAccountRecoveryId;
    }

    public function getMethod(): IUserAccountRecoveryMethod
    {
        return $this->userAccountRecoveryMethod;
    }
}
