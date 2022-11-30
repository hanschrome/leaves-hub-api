<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories\User;

use App\Models\UserEloquentModel;
use Exception;
use Ramsey\Uuid\Uuid;
use Src\Domain\User\Repositories\IUserRepository;
use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserId\IUserId;
use Src\Domain\User\Properties\UserCreatedAt\UserCreatedAt;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserEmailVerifiedAt\UserEmailVerifiedAt;
use Src\Domain\User\Properties\UserId\UserId;
use Src\Domain\User\Properties\UserPassword\IUserPassword;
use Src\Domain\User\Properties\UserPassword\UserPassword;
use Src\Domain\User\Properties\UserStatus\UserStatus;
use Src\Domain\User\Properties\UserUpdatedAt\UserUpdatedAt;
use Src\Domain\User\Properties\UserVerifyToken\UserVerifyToken;
use Src\Domain\User\User;
use Src\Infrastructure\Repositories\User\Exceptions\UserNotSavedException;

class UserEloquentRepository implements IUserRepository
{
    public function findUserById(IUserId $userId): IUser
    {
        /** @var UserEloquentModel $eloquentUser */
        $eloquentUser = UserEloquentModel::all(['uuid' => $userId->value()])->first();

        return new User(
            new UserId($eloquentUser->uuid),
            new UserEmail($eloquentUser->email),
            new UserEmailVerifiedAt($eloquentUser->email_verified_at),
            new UserStatus($eloquentUser->status),
            new UserPassword($eloquentUser->password),
            new UserVerifyToken($eloquentUser->verify_token),
            new UserUpdatedAt($eloquentUser->updated_at),
            new UserCreatedAt($eloquentUser->created_at)
        );
    }

    public function findUserByEmail(IUserEmail $userEmail): IUser
    {
        /** @var UserEloquentModel $eloquentUser */
        $eloquentUser = UserEloquentModel::all()->where('email', '=', $userEmail->value())->first();

        return new User(
            new UserId($eloquentUser->uuid),
            new UserEmail($eloquentUser->email),
            new UserEmailVerifiedAt($eloquentUser->email_verified_at),
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
            new UserEmailVerifiedAt($eloquentUser->email_verified_at),
            new UserStatus($eloquentUser->status),
            new UserPassword($eloquentUser->password),
            new UserVerifyToken($eloquentUser->verify_token),
            new UserUpdatedAt($eloquentUser->updated_at),
            new UserCreatedAt($eloquentUser->created_at)
        );
    }

    public function existsUserByEmail(IUserEmail $userEmail): bool
    {
        /** @var UserEloquentModel $eloquentUser */
        $eloquentUser = UserEloquentModel::all()->where('email', '=', $userEmail->value())->first();

        return $eloquentUser !== null;
    }

    /**
     * @throws Exception
     */
    public function createUnsignedUserByEmail(IUserEmail $userEmail): IUser
    {
        $userId = new UserId(Uuid::uuid4()->toString());
        $userVerifiedAt = new UserEmailVerifiedAt();
        $userStatus = new UserStatus(UserStatus::UNSIGNED);
        $userPassword = new UserPassword('');
        $userVerifyToken = new UserVerifyToken(Uuid::uuid4()->toString());
        $userUpdatedAt = new UserUpdatedAt(now()->timestamp);
        $userCreatedAt = new UserCreatedAt(now()->timestamp);

        $user = new User(
            $userId,
            $userEmail,
            $userVerifiedAt,
            $userStatus,
            $userPassword,
            $userVerifyToken,
            $userUpdatedAt,
            $userCreatedAt
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

    /**
     * @throws UserNotSavedException
     */
    public function updateUser(IUser $user): void
    {
        /** @var UserEloquentModel $eloquentUser */
        $eloquentUser = UserEloquentModel::all(['uuid' => $user->getId()->value()])->first();

        $eloquentUser->email = $user->getEmail()->value();
        $eloquentUser->verify_token = $user->getVerifyToken()->value();
        $eloquentUser->status = $user->getStatus()->value();
        $eloquentUser->password = $user->getPassword()->value();
        $eloquentUser->updated_at = now()->timestamp;
        $eloquentUser->created_at = $user->getCreatedAt()->value();

        if (!$eloquentUser->save()) {
            throw new UserNotSavedException();
        }
    }
}
