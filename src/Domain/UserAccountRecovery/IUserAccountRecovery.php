<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery;

use Src\Domain\User\IUser;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\IUserAccountRecoveryMethod;

interface IUserAccountRecovery
{
    public function __construct(
        IUserAccountRecoveryId $userAccountRecoveryId,
        IUserAccountRecoveryMethod $userAccountRecoveryMethod,
        IUser $user
    );

    public function getId(): IUserAccountRecoveryId;

    public function getMethod(): IUserAccountRecoveryMethod;

    public function getUser(): IUser;
}
