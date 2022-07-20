<?php

declare(strict_types=1);

namespace Src\Domain\User\Services;

use Src\Domain\User\Properties\UserEmail\IUserEmail;

interface IUserRegistrationService
{
    public function registerUserByEmail(IUserEmail $userEmail): bool;
}
