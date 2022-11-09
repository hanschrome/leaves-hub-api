<?php

declare(strict_types=1);

namespace Src\Domain\User\Services\Registration;

use Src\App\UseCase\User\Registration\Exception\RegisterUserActionNotVerifiedUserIntentException;
use Src\App\UseCase\User\Registration\Exception\RegisterUserActionVerifiedUserIntentException;
use Src\Domain\User\Properties\UserEmail\IUserEmail;

interface IUserRegistrationService
{
    /**
     * @throws RegisterUserActionVerifiedUserIntentException
     * @throws RegisterUserActionNotVerifiedUserIntentException
     */
    public function registerUserByEmail(IUserEmail $userEmail): void;
}
