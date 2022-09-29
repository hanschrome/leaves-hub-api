<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery;

use Src\Domain\User\IUser;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryCreatedAt\IUserAccountRecoveryCreatedAt;
use Src\Domain\UserACcountRecovery\Properties\UserAccountRecoveryDueDate\IUserAccountRecoveryDueDate;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\IUserAccountRecoveryMethod;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoverySecretCode\IUserAccountRecoverySecretCode;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus\IUserAccountRecoveryStatus;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryUpdatedAt\IUserAccountRecoveryUpdatedAt;

class UserAccountRecovery implements IUserAccountRecovery
{
    private IUserAccountRecoveryId $userAccountRecoveryId;
    private IUserAccountRecoveryMethod $userAccountRecoveryMethod;
    private IUser $user;
    private IUserAccountRecoveryStatus $userAccountRecoveryStatus;
    private IUserAccountRecoverySecretCode $userAccountRecoverySecretCode;
    private IUserAccountRecoveryDueDate $userAccountRecoveryDueDate;
    private IUserAccountRecoveryUpdatedAt $userAccountRecoveryUpdatedAt;
    private IUserAccountRecoveryCreatedAt $userAccountRecoveryCreatedAt;

    public function __construct(
        IUserAccountRecoveryId $userAccountRecoveryId,
        IUserAccountRecoveryMethod $userAccountRecoveryMethod,
        IUser $user,
        IUserAccountRecoveryStatus $userAccountRecoveryStatus,
        IUserAccountRecoverySecretCode $userAccountRecoverySecretCode,
        IUserAccountRecoveryDueDate $userAccountRecoveryDueDate,
        IUserAccountRecoveryUpdatedAt $userAccountRecoveryUpdatedAt,
        IUserAccountRecoveryCreatedAt $userAccountRecoveryCreatedAt
    )
    {
        $this->userAccountRecoveryId = $userAccountRecoveryId;
        $this->userAccountRecoveryMethod = $userAccountRecoveryMethod;
        $this->user = $user;
        $this->userAccountRecoveryStatus = $userAccountRecoveryStatus;
        $this->userAccountRecoverySecretCode = $userAccountRecoverySecretCode;
        $this->userAccountRecoveryDueDate = $userAccountRecoveryDueDate;
        $this->userAccountRecoveryUpdatedAt = $userAccountRecoveryUpdatedAt;
        $this->userAccountRecoveryCreatedAt = $userAccountRecoveryCreatedAt;
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

    public function getStatus(): IUserAccountRecoveryStatus
    {
        return $this->userAccountRecoveryStatus;
    }

    public function getSecretCode(): IUserAccountRecoverySecretCode
    {
        return $this->userAccountRecoverySecretCode;
    }

    public function getDueDate(): IUserAccountRecoveryDueDate
    {
        return $this->userAccountRecoveryDueDate;
    }

    public function getUpdatedAt(): IUserAccountRecoveryUpdatedAt
    {
        return $this->userAccountRecoveryUpdatedAt;
    }

    public function getCreatedAt(): IUserAccountRecoveryCreatedAt
    {
        return $this->userAccountRecoveryCreatedAt;
    }
}
