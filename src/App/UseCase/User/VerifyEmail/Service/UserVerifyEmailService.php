<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\VerifyEmail\Service;

use Src\App\UseCase\User\VerifyEmail\Exception\VerifyEmailActionWrongTokenException;
use Src\Domain\User\Repositories\IUserRepository;
use Src\Domain\User\Properties\UserId\IUserId;
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

    /**
     * @throws VerifyEmailActionWrongTokenException
     */
    public function verifyUserByIdAndToken(IUserId $userId, IUserVerifyToken $userVerifyToken): void
    {
        $user = $this->userRepository->findUserById($userId);

        if ($user->getVerifyToken() != $userVerifyToken->value()) {
            throw new VerifyEmailActionWrongTokenException();
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
