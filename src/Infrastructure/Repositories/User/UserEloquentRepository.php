<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories\User;

use App\Models\UserEloquentModel;
use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserId;
use Src\Domain\User\User;

class UserEloquentRepository implements IUserRepository
{
    public function findUserByEmail(IUserEmail $userEmail): IUser
    {
        $eloquentUser = UserEloquentModel::all(['email' => $userEmail->value()])->first();

        return User::fromEloquentModel($eloquentUser);
    }

    public function createUnsignedUserByEmail(IUserEmail $userEmail): IUser
    {
        $user = new User(new UserId(''), $userEmail);

        $userEloquent = new UserEloquentModel();
        $userEloquent->uuid = $user->getId()->value();
        $userEloquent->email = $user->getEmail()->value();

        if(!$userEloquent->save()) {
            throw new \Exception();
        }

        return $user;
    }
}
