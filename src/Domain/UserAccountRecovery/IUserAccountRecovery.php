<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery;

use Src\Domain\User\Properties\IUserId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryCreatedAt\IUserAccountRecoveryCreatedAt;
use Src\Domain\UserACcountRecovery\Properties\UserAccountRecoveryDueDate\IUserAccountRecoveryDueDate;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\IUserAccountRecoveryMethod;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoverySecretCode\IUserAccountRecoverySecretCode;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus\IUserAccountRecoveryStatus;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryUpdatedAt\IUserAccountRecoveryUpdatedAt;

interface IUserAccountRecovery
{
    public function __construct(
        IUserAccountRecoveryId $userAccountRecoveryId,
        IUserAccountRecoveryMethod $userAccountRecoveryMethod,
        IUserId $userId,
        IUserAccountRecoveryStatus $userAccountRecoveryStatus,
        IUserAccountRecoverySecretCode $accountUserAccountRecoverySecretCode,
        IUserAccountRecoveryDueDate $userAccountRecoveryDueDate,
        IUserAccountRecoveryUpdatedAt $userAccountRecoveryUpdatedAt,
        IUserAccountRecoveryCreatedAt $userAccountRecoveryCreatedAt
    );

    public function getId(): IUserAccountRecoveryId;

    public function getMethod(): IUserAccountRecoveryMethod;

    public function getUserId(): IUserId;

    public function getStatus(): IUserAccountRecoveryStatus;

    public function getSecretCode(): IUserAccountRecoverySecretCode;

    public function getDueDate(): IUserAccountRecoveryDueDate;

    public function getUpdatedAt(): IUserAccountRecoveryUpdatedAt;

    public function getCreatedAt(): IUserAccountRecoveryCreatedAt;
}
