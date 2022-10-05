<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories\UserSession;

use Src\Domain\UserSession\IUserSession;
use Src\Domain\UserSession\Repositories\IUserSessionRepository;

class UserSessionEloquentRepository implements IUserSessionRepository
{

    public function create(IUserSession $userSession): IUserSession
    {
        // TODO: Implement createSessionByUser() method.
    }
}
