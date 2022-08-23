<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Login\Service;

use Src\Domain\User\IUser;
use Src\Domain\UserSession\IUserSession;
use Src\Domain\UserSession\Repositories\IUserSessionRepository;
use Src\Domain\UserSession\Services\Login\IUserSessionLoginService;

class UserSessionLoginService implements IUserSessionLoginService
{
    private IUserSessionRepository $userSessionRepository;

    public function __construct(IUserSessionRepository $userSessionRepository)
    {
        $this->userSessionRepository = $userSessionRepository;
    }

    public function startSessionByUser(IUser $user): IUserSession
    {
        // @todo
    }
}
