<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery;

use Src\Domain\User\IUser;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryCreatedAt\IUserAccountRecoveryCreatedAt;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\IUserAccountRecoveryMethod;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoverySecretCode\IUserAccountRecoverySecretCode;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus\IUserAccountRecoveryStatus;

interface IUserAccountRecovery
{
    public function __construct(
        IUserAccountRecoveryId $userAccountRecoveryId,
        IUserAccountRecoveryMethod $userAccountRecoveryMethod,
        IUser $user,
        IUserAccountRecoveryStatus $userAccountRecoveryStatus,
        IUserAccountRecoverySecretCode $accountUserAccountRecoverySecretCode,
        IUserAccountRecoveryCreatedAt $userAccountRecoveryCreatedAt
    );

    public function getId(): IUserAccountRecoveryId;

    public function getMethod(): IUserAccountRecoveryMethod;

    public function getUser(): IUser;

    public function getStatus(): IUserAccountRecoveryStatus;

    public function getSecretCode(): IUserAccountRecoverySecretCode;

    public function getCreatedAt(): IUserAccountRecoveryCreatedAt;
}
