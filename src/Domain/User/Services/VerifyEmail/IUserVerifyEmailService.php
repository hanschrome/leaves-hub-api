<?php

declare(strict_types=1);

namespace Src\Domain\User\Services\VerifyEmail;

use Src\Domain\User\Properties\IUserId;
use Src\Domain\User\Properties\UserVerifyToken\IUserVerifyToken;

interface IUserVerifyEmailService
{
    public function verifyUserByIdAndToken(IUserId $userId, IUserVerifyToken $userVerifyToken): bool;
}
