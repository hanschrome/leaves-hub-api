<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Services\Login;

use Src\App\UseCase\User\Login\Exception\LoginUserActionUserWrongStatusException;
use Src\Domain\User\IUser;
use Src\Domain\UserSession\IUserSession;

interface IUserSessionLoginService
{
    /**
     * @throws LoginUserActionUserWrongStatusException
     */
    public function startSessionByUser(IUser $user): IUserSession;
}
