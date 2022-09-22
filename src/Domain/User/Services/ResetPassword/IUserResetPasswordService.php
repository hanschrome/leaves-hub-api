<?php

declare(strict_types=1);

namespace Src\Domain\User\Services\ResetPassword;

use Src\Domain\User\Properties\UserEmail\UserEmail;

interface IUserResetPasswordService
{
    public function resetPasswordByEmail(UserEmail $userEmail): bool; // this method always return true for security purposes.
}
