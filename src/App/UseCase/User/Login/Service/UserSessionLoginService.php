<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Login\Service;

use Ramsey\Uuid\Uuid;
use Src\App\UseCase\User\Login\Exception\LoginUserActionUserWrongStatusException;
use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserStatus\UserStatus;
use Src\Domain\UserSession\IUserSession;
use Src\Domain\UserSession\Properties\UserSessionCreatedAt\UserSessionCreatedAt;
use Src\Domain\USerSession\Properties\UserSessionExpirationDate\UserSessionExpirationDate;
use Src\Domain\UserSession\Properties\UserSessionId\UserSessionId;
use Src\Domain\UserSession\Properties\UserSessionStatus\IUserSessionStatus;
use Src\Domain\UserSession\Properties\UserSessionStatus\UserSessionStatus;
use Src\Domain\UserSession\Properties\UserSessionUpdatedAt\UserSessionUpdatedAt;
use Src\Domain\UserSession\Repositories\IUserSessionRepository;
use Src\Domain\UserSession\Services\Login\IUserSessionLoginService;
use Src\Domain\UserSession\UserSession;

class UserSessionLoginService implements IUserSessionLoginService
{
    private IUserSessionRepository $userSessionRepository;

    public function __construct(IUserSessionRepository $userSessionRepository)
    {
        $this->userSessionRepository = $userSessionRepository;
    }

    /**
     * @throws LoginUserActionUserWrongStatusException
     */
    public function startSessionByUser(IUser $user): IUserSession
    {
        if ($user->getStatus()->value() !== UserStatus::ACTIVE) {
            throw new LoginUserActionUserWrongStatusException();
        }

        $userSession = new UserSession(
            new UserSessionId(Uuid::uuid4()->toString()),
            new UserSessionStatus(IUserSessionStatus::STATUS_VALID),
            new UserSessionExpirationDate(null),
            new UserSessionUpdatedAt(now()->timestamp),
            new UserSessionCreatedAt(now()->timestamp)
        );

        return $this->userSessionRepository->create($userSession);
    }
}
