<?php

declare(strict_types=1);

namespace Src\Domain\User;

use Src\Domain\User\Properties\IUserId;
use Src\Domain\User\Properties\UserEmail\IUserEmail;

class User implements IUser
{
    private IUserId $id;
    private IUserEmail $email;

    public function __construct(IUserId $userId, IUserEmail $userEmail)
    {
        $this->id = $userId;
        $this->email = $userEmail;
    }

    public function getId(): IUserId
    {
        return $this->id;
    }

    public function getEmail(): IUserEmail
    {
        return $this->email;
    }

}
