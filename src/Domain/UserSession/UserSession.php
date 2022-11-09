<?php

declare(strict_types=1);

namespace Src\Domain\UserSession;

use Src\Domain\User\Properties\UserId\IUserId;
use Src\Domain\UserSession\Properties\UserSessionCreatedAt\IUserSessionCreatedAt;
use Src\Domain\UserSession\Properties\UserSessionExpirationDate\IUserSessionExpirationDate;
use Src\Domain\UserSession\Properties\UserSessionId\IUserSessionId;
use Src\Domain\UserSession\Properties\UserSessionStatus\IUserSessionStatus;
use Src\Domain\UserSession\Properties\UserSessionUpdatedAt\IUserSessionUpdatedAt;

class UserSession implements IUserSession
{
    private IUserSessionId $userSessionId;
    private IUserSessionStatus $userSessionStatus;
    private IUserSessionExpirationDate $userSessionExpirationDate;
    private IUserSessionUpdatedAt $userSessionUpdatedAt;
    private IUserSessionCreatedAt $userSessionCreatedAt;

    public function __construct(IUserSessionId $userSessionId, IUserSessionStatus $userSessionStatus, IUserSessionExpirationDate $userSessionExpirationDate, IUserSessionUpdatedAt $userSessionUpdatedAt, IUserSessionCreatedAt $userSessionCreatedAt)
    {
        $this->userSessionId = $userSessionId;
        $this->userSessionStatus = $userSessionStatus;
        $this->userSessionExpirationDate = $userSessionExpirationDate;
        $this->userSessionUpdatedAt = $userSessionUpdatedAt;
        $this->userSessionCreatedAt = $userSessionCreatedAt;
    }

    public function getUserSessionId(): IUserSessionId
    {
        return $this->userSessionId;
    }

    public function getUserSessionStatus(): IUserSessionStatus
    {
        return $this->userSessionStatus;
    }

    public function getUserSessionExpirationDate(): IUserSessionExpirationDate
    {
        return $this->userSessionExpirationDate;
    }

    public function getUserSessionUpdatedAt(): IUserSessionUpdatedAt
    {
        return $this->userSessionUpdatedAt;
    }

    public function getUserSessionCreatedAt(): IUserSessionCreatedAt
    {
        return $this->userSessionCreatedAt;
    }
}
