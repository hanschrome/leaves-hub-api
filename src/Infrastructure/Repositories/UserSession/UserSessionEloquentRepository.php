<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories\UserSession;

use Src\Domain\User\IUser;
use Src\Domain\UserSession\IUserSession;
use Src\Domain\UserSession\Repositories\IUserSessionRepository;

class UserSessionEloquentRepository implements IUserSessionRepository
{

    public function createSessionByUser(IUser $user): IUserSession
    {
        // TODO: Implement createSessionByUser() method.
    }
}
