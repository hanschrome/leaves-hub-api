<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery;

use Src\Domain\User\IUser;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\IUserAccountRecoveryMethod;

class UserAccountRecovery implements IUserAccountRecovery
{
    private IUserAccountRecoveryId $userAccountRecoveryId;
    private IUserAccountRecoveryMethod $userAccountRecoveryMethod;
    private IUser $user;

    public function __construct(
        IUserAccountRecoveryId $userAccountRecoveryId,
        IUserAccountRecoveryMethod $userAccountRecoveryMethod,
        IUser $user
    )
    {
        $this->userAccountRecoveryId = $userAccountRecoveryId;
        $this->userAccountRecoveryMethod = $userAccountRecoveryMethod;
        $this->user = $user;
    }

    public function getId(): IUserAccountRecoveryId
    {
        return $this->userAccountRecoveryId;
    }

    public function getMethod(): IUserAccountRecoveryMethod
    {
        return $this->userAccountRecoveryMethod;
    }

    public function getUser(): IUser
    {
        return $this->user;
    }
}
