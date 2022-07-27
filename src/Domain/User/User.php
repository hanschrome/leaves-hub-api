<?php

declare(strict_types=1);

namespace Src\Domain\User;

use Src\Domain\User\Properties\IUserId;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserEmailVerifiedAt\IUserVerifiedAt;

class User implements IUser
{
    private IUserId $id;
    private IUserEmail $email;
    private IUserVerifiedAt $userVerifiedAt;

    public function __construct(
        IUserId $userId,
        IUserEmail $userEmail,
        IUserVerifiedAt $userVerifiedAt
    ) {
        $this->id = $userId;
        $this->email = $userEmail;
        $this->userVerifiedAt = $userVerifiedAt;
    }

    public function getId(): IUserId
    {
        return $this->id;
    }

    public function getEmail(): IUserEmail
    {
        return $this->email;
    }

    public function getEmailVerifiedAt(): IUserVerifiedAt
    {
        return $this->userVerifiedAt;
    }
}
