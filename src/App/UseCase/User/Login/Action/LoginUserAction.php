<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Login\Action;

use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserPassword\UserPassword;
use Src\Domain\User\Services\Login\IUserLoginService;
use Src\Infrastructure\Api\Response\IResponse;
use Src\Infrastructure\Api\Response\Login\LoginSuccessUserResponse;
use Src\Infrastructure\Api\Response\Login\LoginWrongUserResponse;

class LoginUserAction
{
    public const PARAM_EMAIL = 'email';
    public const PARAM_PASSWORD = 'password';
    private IUserLoginService $userLoginService;

    public function __construct(IUserLoginService $userLoginService)
    {
        $this->userLoginService = $userLoginService;
    }

    public function __invoke(array $requestJsonBody): IResponse
    {
        $email = $requestJsonBody[self::PARAM_EMAIL];
        $password = $requestJsonBody[self::PARAM_PASSWORD];

        $success = true;

        try {
            $user = $this->userLoginService->startSessionByEmailAndPassword(new UserEmail($email), new UserPassword($password));
            // @todo add here the session
        } catch (\Throwable $throwable) { // @todo log and handle better this exception
            $success = false;
        }

        return $success ? new LoginSuccessUserResponse() : new LoginWrongUserResponse();
    }
}
