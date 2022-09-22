<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\ResetPassword\Service;

use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Services\ResetPassword\IUserResetPasswordService;

class UserResetPasswordService implements IUserResetPasswordService
{
    public function resetPasswordByEmail(UserEmail $userEmail): bool
    {
        return true;
    }
}
