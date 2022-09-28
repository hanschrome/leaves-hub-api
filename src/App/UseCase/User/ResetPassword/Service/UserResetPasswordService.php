<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\ResetPassword\Service;

use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserStatus\UserStatus;
use Src\Domain\User\Services\ResetPassword\IUserResetPasswordService;

class UserResetPasswordService implements IUserResetPasswordService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function resetPasswordByEmail(UserEmail $userEmail): bool
    {
        $user = $this->userRepository->findUserByEmail($userEmail);

        if ($user->getStatus() == UserStatus::ACTIVE) {
            
        }

        return true;
    }
}
