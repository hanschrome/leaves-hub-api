<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Login\Service;

use Src\App\UseCase\User\Login\Exception\LoginUserActionUserNotFoundWithPasswordException;
use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserPassword\IUserPassword;
use Src\Domain\User\Services\Login\IUserLoginService;

class UserLoginService implements IUserLoginService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws LoginUserActionUserNotFoundWithPasswordException
     */
    public function findUserByEmailAndPassword(IUserEmail $userEmail, IUserPassword $userPassword): IUser
    {
        $user = $this->userRepository->findUserByEmailAndPassword($userEmail, $userPassword);

        if ($user === null) {
            throw new LoginUserActionUserNotFoundWithPasswordException();
        }

        return $user;
    }
}
