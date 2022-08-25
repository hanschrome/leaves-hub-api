<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\VerifyEmail\Service;

use Src\Domain\User\Properties\IUserId;
use Src\Domain\User\Properties\UserVerifyToken\IUserVerifyToken;
use Src\Domain\User\Services\VerifyEmail\IUserVerifyEmailService;

class UserVerifyEmailService implements IUserVerifyEmailService
{

    public function verifyUserByIdAndToken(IUserId $userId, IUserVerifyToken $userVerifyToken): bool
    {
        return true;
    }
}
