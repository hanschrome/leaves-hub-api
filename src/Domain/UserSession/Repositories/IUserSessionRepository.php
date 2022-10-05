<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Repositories;

use Src\Domain\User\IUser;
use Src\Domain\UserSession\IUserSession;

interface IUserSessionRepository
{
    public function create(IUserSession $userSession): IUserSession;
}
