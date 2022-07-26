<?php

declare(strict_types=1);

namespace Src\Domain\User;

use Src\Domain\User\Properties\IUserId;
use Src\Domain\User\Properties\UserEmail\IUserEmail;

interface IUser
{
    public function __construct(IUserId $userId, IUserEmail $userEmail);

    public function getId(): IUserId;

    public function getEmail(): IUserEmail;
}
