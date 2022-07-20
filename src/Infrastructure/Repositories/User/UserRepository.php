<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories\User;

use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserId;
use Src\Domain\User\User;

class UserRepository implements IUserRepository
{
    public function findUserByEmail(IUserEmail $userEmail): IUser
    {
        return new User(new UserId('absdfsad-asdad-asdasd-asdasd'), new UserEmail('test@test.com'));
    }

    public function createUnsignedUserByEmail(IUserEmail $userEmail): IUser
    {
        return new User(new UserId('absdfsad-asdad-asdasd-asdasd'), new UserEmail('test@test.com'));
    }
}
