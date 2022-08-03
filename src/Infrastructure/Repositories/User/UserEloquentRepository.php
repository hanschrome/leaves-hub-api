<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories\User;

use App\Models\UserEloquentModel;
use Exception;
use Ramsey\Uuid\Uuid;
use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserCreatedAt\UserCreatedAt;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserEmailVerifiedAt\UserVerifiedAt;
use Src\Domain\User\Properties\UserId;
use Src\Domain\User\Properties\UserPassword\IUserPassword;
use Src\Domain\User\Properties\UserPassword\UserPassword;
use Src\Domain\User\Properties\UserStatus\UserStatus;
use Src\Domain\User\Properties\UserUpdatedAt\UserUpdatedAt;
use Src\Domain\User\Properties\UserVerifyToken\UserVerifyToken;
use Src\Domain\User\User;
use Src\Infrastructure\Repositories\User\Exceptions\UserNotSavedException\UserNotSavedException;

class UserEloquentRepository implements IUserRepository
{
    public function findUserByEmail(IUserEmail $userEmail): IUser
    {
        /** @var UserEloquentModel $eloquentUser */
        $eloquentUser = UserEloquentModel::all(['email' => $userEmail->value()])->first();

        return new User(
            new UserId($eloquentUser->uuid),
            new UserEmail($eloquentUser->email),
            new UserVerifiedAt($eloquentUser->email_verified_at),
            new UserStatus($eloquentUser->status),
            new UserPassword($eloquentUser->password),
            new UserVerifyToken($eloquentUser->verify_token),
            new UserUpdatedAt($eloquentUser->updated_at),
            new UserCreatedAt($eloquentUser->created_at)
        );
    }

    public function findUserByEmailAndPassword(IUserEmail $userEmail, IUserPassword $userPassword): IUser
    {
        /** @var UserEloquentModel $eloquentUser */
        $eloquentUser = UserEloquentModel::all(['email' => $userEmail->value(), 'password' => $userPassword->value()])->first;

        return new User(
            new UserId($eloquentUser->uuid),
            new UserEmail($eloquentUser->email),
            new UserVerifiedAt($eloquentUser->email_verified_at),
            new UserStatus($eloquentUser->status),
            new UserPassword($eloquentUser->password),
            new UserVerifyToken($eloquentUser->verify_token),
            new UserUpdatedAt($eloquentUser->updated_at),
            new UserCreatedAt($eloquentUser->created_at)
        );
    }

    /**
     * @throws Exception
     */
    public function createUnsignedUserByEmail(IUserEmail $userEmail): IUser
    {
        $user = new User(
            new UserId(Uuid::uuid4()->toString()),
            $userEmail,
            new UserVerifiedAt(),
            new UserStatus(UserStatus::UNSIGNED),
            new UserPassword(''),
            new UserVerifyToken(Uuid::uuid4()->toString()),
            new UserUpdatedAt(now()->timestamp),
            new UserCreatedAt(now()->timestamp)
        );

        $userEloquent = new UserEloquentModel();
        $userEloquent->uuid = $user->getId()->value();
        $userEloquent->email = $user->getEmail()->value();
        $userEloquent->verify_token = $user->getVerifyToken()->value();
        $userEloquent->status = $user->getStatus()->value();
        $userEloquent->password = $user->getPassword()->value();
        $userEloquent->updated_at = $user->getUpdatedAt()->value();
        $userEloquent->created_at = $user->getCreatedAt()->value();

        if(!$userEloquent->save()) {
            throw new UserNotSavedException();
        }

        return $user;
    }
}
