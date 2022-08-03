<?php

declare(strict_types=1);

namespace Src\Domain\User\Services\Login;

use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserPassword\IUserPassword;

interface IUserLoginService
{
    public function startSessionByEmailAndPassword(IUserEmail $userEmail, IUserPassword $userPassword): IUser;
}
