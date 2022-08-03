<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Login\Service;

use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\IUser;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Properties\UserPassword\IUserPassword;
use Src\Domain\User\Services\Login\IUserLoginService;
use Exception;

class UserLoginService implements IUserLoginService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws Exception
     */
    public function startSessionByEmailAndPassword(IUserEmail $userEmail, IUserPassword $userPassword): IUser
    {
        $user = $this->userRepository->findUserByEmailAndPassword($userEmail, $userPassword);

        if ($user === null) {
            throw new Exception();
        }

        return $user;
    }
}
