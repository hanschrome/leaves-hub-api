<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Login\Action;

use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserPassword\UserPassword;
use Src\Domain\User\Services\Login\IUserLoginService;
use Src\Domain\UserSession\Services\Login\IUserSessionLoginService;
use Src\Infrastructure\Api\Response\IResponse;
use Src\Infrastructure\Api\Response\Login\LoginSuccessUserResponse;
use Src\Infrastructure\Api\Response\Login\LoginWrongUserResponse;

class LoginUserAction
{
    public const PARAM_EMAIL = 'email';
    public const PARAM_PASSWORD = 'password';
    private IUserLoginService $userLoginService;
    private IUserSessionLoginService $userSessionLoginService;

    public function __construct(
        IUserLoginService $userLoginService,
        IUserSessionLoginService $userSessionLoginService
    )
    {
        $this->userLoginService = $userLoginService;
        $this->userSessionLoginService = $userSessionLoginService;
    }

    public function __invoke(array $requestJsonBody): IResponse
    {
        $email = $requestJsonBody[self::PARAM_EMAIL];
        $password = $requestJsonBody[self::PARAM_PASSWORD];
        $userSession = null;

        try {
            $user = $this->userLoginService->findUserByEmailAndPassword(new UserEmail($email), new UserPassword($password));

            $userSession = $this->userSessionLoginService->startSessionByUser($user);
        } catch (\Throwable $throwable) { // @todo log and handle better this exception

        }

        return $userSession ? new LoginSuccessUserResponse($userSession->getId()) : new LoginWrongUserResponse();
    }
}
