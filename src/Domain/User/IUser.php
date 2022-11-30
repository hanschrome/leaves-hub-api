<?php

declare(strict_types=1);

namespace Src\Domain\User;

use Src\Domain\User\Properties\UserId\IUserId;
use Src\Domain\User\Properties\UserCreatedAt\IUserCreatedAt;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserEmailVerifiedAt\IUserEmailVerifiedAt;
use Src\Domain\User\Properties\UserPassword\IUserPassword;
use Src\Domain\User\Properties\UserStatus\IUserStatus;
use Src\Domain\User\Properties\UserUpdatedAt\IUserUpdatedAt;
use Src\Domain\User\Properties\UserVerifyToken\IUserVerifyToken;

interface IUser
{
    public function __construct(
        IUserId              $userId,
        IUserEmail           $userEmail,
        IUserEmailVerifiedAt $emailVerifiedAt,
        IUserStatus          $userStatus,
        IUserPassword        $userPassword,
        IUserVerifyToken     $userVerifyToken,
        IUserUpdatedAt       $userUpdatedAt,
        IUserCreatedAt       $userCreatedAt
    );

    public function getId(): IUserId;

    public function getEmail(): IUserEmail;

    public function getVerifiedAt(): IUserEmailVerifiedAt;

    public function getStatus(): IUserStatus;

    public function getPassword(): IUserPassword;

    public function getVerifyToken(): IUserVerifyToken;

    public function getUpdatedAt(): IUserUpdatedAt;

    public function getCreatedAt(): IUserCreatedAt;
}
