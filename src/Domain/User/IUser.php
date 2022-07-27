<?php

declare(strict_types=1);

namespace Src\Domain\User;

use Src\Domain\User\Properties\IUserId;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserEmailVerifiedAt\IUserVerifiedAt;

interface IUser
{
    public function __construct(
        IUserId $userId,
        IUserEmail $userEmail,
        IUserVerifiedAt $emailVerifiedAt
    );

    public function getId(): IUserId;

    public function getEmail(): IUserEmail;

    public function getEmailVerifiedAt(): IUserVerifiedAt;
}
