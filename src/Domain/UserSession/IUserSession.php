<?php

declare(strict_types=1);

namespace Src\Domain\UserSession;

use Src\Domain\User\Properties\UserId\IUserId;
use Src\Domain\UserSession\Properties\UserSessionCreatedAt\IUserSessionCreatedAt;
use Src\Domain\UserSession\Properties\UserSessionExpirationDate\IUserSessionExpirationDate;
use Src\Domain\UserSession\Properties\UserSessionId\IUserSessionId;
use Src\Domain\UserSession\Properties\UserSessionStatus\IUserSessionStatus;
use Src\Domain\UserSession\Properties\UserSessionUpdatedAt\IUserSessionUpdatedAt;

interface IUserSession
{
    public function getId(): IUserSessionId;

    public function getUserId(): IUserId;

    public function getStatus(): IUserSessionStatus;

    public function getExpirationDate(): IUserSessionExpirationDate;

    public function getUpdatedAt(): IUserSessionUpdatedAt;

    public function getCreatedAt(): IUserSessionCreatedAt;
}
