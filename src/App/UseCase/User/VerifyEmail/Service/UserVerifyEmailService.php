<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\VerifyEmail\Service;

use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\Properties\IUserId;
use Src\Domain\User\Properties\UserEmailVerifiedAt\UserVerifiedAt;
use Src\Domain\User\Properties\UserStatus\UserStatus;
use Src\Domain\User\Properties\UserVerifyToken\IUserVerifyToken;
use Src\Domain\User\Services\VerifyEmail\IUserVerifyEmailService;
use Src\Domain\User\User;

class UserVerifyEmailService implements IUserVerifyEmailService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function verifyUserByIdAndToken(IUserId $userId, IUserVerifyToken $userVerifyToken): void
    {
        /**
         * - Get the user
         * - Validate the token is the same
         * - Validate the user
         * - Save the user
         */
        $user = $this->userRepository->findUserById($userId);

        if ($user->getVerifyToken() != $userVerifyToken->value()) {
            throw new \Exception();
        }

        $newUser = new User(
            $user->getId(),
            $user->getEmail(),
            new UserVerifiedAt(time()),
            new UserStatus(UserStatus::ACTIVE),
            $user->getPassword(),
            $user->getVerifyToken(),
            $user->getUpdatedAt(),
            $user->getCreatedAt()
        );

        $this->userRepository->updateUser($newUser);
    }
}
