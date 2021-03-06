<?php

declare(strict_types=1);

namespace Src\Domain\Repositories;

use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserPassword\IUserPassword;

interface IUserRepository
{
    public function findUserByEmail(IUserEmail $userEmail): ?IUser;

    public function findUserByEmailAndPassword(IUserEmail $userEmail, IUserPassword $userPassword): ? IUser;

    public function createUnsignedUserByEmail(IUserEmail $userEmail): IUser;
}
