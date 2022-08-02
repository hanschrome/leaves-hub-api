<?php

declare(strict_types=1);

namespace Src\Domain\User;

use Src\Domain\User\Properties\IUserId;
use Src\Domain\User\Properties\UserCreatedAt\IUserCreatedAt;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserEmailVerifiedAt\IUserVerifiedAt;
use Src\Domain\User\Properties\UserPassword\IUserPassword;
use Src\Domain\User\Properties\UserStatus\IUserStatus;
use Src\Domain\User\Properties\UserUpdatedAt\IUserUpdatedAt;
use Src\Domain\User\Properties\UserVerifyToken\IUserVerifyToken;

class User implements IUser
{
    private IUserId $id;
    private IUserEmail $email;
    private IUserVerifiedAt $verifiedAt;
    private IUserStatus $status;
    private IUserPassword $password;
    private IUserVerifyToken $verifyToken;
    private IUserUpdatedAt $updatedAt;
    private IUserCreatedAt $createdAt;

    public function __construct(IUserId          $userId,
                                IUserEmail       $userEmail,
                                IUserVerifiedAt  $emailVerifiedAt,
                                IUserStatus      $userStatus,
                                IUserPassword    $userPassword,
                                IUserVerifyToken $userVerifyToken,
                                IUserUpdatedAt   $userUpdatedAt,
                                IUserCreatedAt   $userCreatedAt)
    {
        $this->id = $userId;
        $this->email = $userEmail;
        $this->verifiedAt = $emailVerifiedAt;
        $this->status = $userStatus;
        $this->password = $userPassword;
        $this->verifyToken = $userVerifyToken;
        $this->updatedAt = $userUpdatedAt;
        $this->createdAt = $userCreatedAt;
    }

    public function getId(): IUserId
    {
        return $this->id;
    }

    public function getEmail(): IUserEmail
    {
        return $this->email;
    }

    public function getVerifiedAt(): IUserVerifiedAt
    {
        return $this->verifiedAt;
    }

    public function getStatus(): IUserStatus
    {
        return $this->status;
    }

    public function getPassword(): IUserPassword
    {
        return $this->password;
    }

    public function getVerifyToken(): IUserVerifyToken
    {
        return $this->verifyToken;
    }

    public function getUpdatedAt(): IUserUpdatedAt
    {
        return $this->updatedAt;
    }

    public function getCreatedAt(): IUserCreatedAt
    {
        return $this->createdAt;
    }


}
