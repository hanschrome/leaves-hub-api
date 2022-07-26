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
use Src\Infrastructure\Repositories\User\Exceptions\UserNotSavedException\UserNotSavedException;

class UserEloquentRepository implements IUserRepository
{
    public function findUserByEmail(IUserEmail $userEmail): IUser
    {
        $eloquentUser = UserEloquentModel::all(['email' => $userEmail->value()])->first();

        return new User(new UserId($eloquentUser->uuid), new UserEmail($eloquentUser->email));
    }

    /**
     * @throws \Exception
     */
    public function createUnsignedUserByEmail(IUserEmail $userEmail): IUser
    {
        $user = new User(new UserId(''), $userEmail);

        $userEloquent = new UserEloquentModel();
        $userEloquent->uuid = $user->getId()->value();
        $userEloquent->email = $user->getEmail()->value();
        $userEloquent->verify_token = '';

        if(!$userEloquent->save()) {
            throw new UserNotSavedException();
        }

        return $user;
    }
}
