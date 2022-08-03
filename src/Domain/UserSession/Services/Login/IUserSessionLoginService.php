<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Services\Login;

use Src\Domain\User\IUser;
use Src\Domain\UserSession\IUserSession;

interface IUserSessionLoginService
{
    public function startSessionByUser(IUser $user): IUserSession;
}
