<?php

declare(strict_types=1);

namespace Src\Domain\Repositories;

use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserEmail\IUserEmail;

interface IUserRepository
{
    public function findUserByEmail(IUserEmail $userEmail): ?IUser;

    public function createUnsignedUserByEmail(IUserEmail $userEmail): IUser;
}
