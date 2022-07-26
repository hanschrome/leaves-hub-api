<?php

declare(strict_types=1);

namespace Src\Domain\User;

use App\Models\UserEloquentModel;
use Src\Domain\User\Properties\IUserId;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserId;

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
