<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Registration\Service;

use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Services\IUserRegistrationService;

class UserRegistrationService implements IUserRegistrationService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUserByEmail(IUserEmail $userEmail): bool
    {
        $user = $this->userRepository->findUserByEmail($userEmail);

        if ($user !== null) {
            return false;
        }

        $unsignedUser = $this->userRepository->createUnsignedUserByEmail($userEmail);

        // Send mail

        return true;
    }
}
