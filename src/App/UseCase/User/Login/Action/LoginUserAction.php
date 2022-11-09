<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Login\Action;

use Src\App\UseCase\User\Login\Exception\LoginUserActionUserNotFoundWithPasswordException;
use Src\App\UseCase\User\Login\Exception\LoginUserActionUserWrongStatusException;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserPassword\UserPassword;
use Src\Domain\User\Services\Login\IUserLoginService;
use Src\Domain\UserSession\Services\Login\IUserSessionLoginService;
use Src\Infrastructure\Api\User\Response\IResponse;
use Src\Infrastructure\Api\User\Response\Login\LoginSuccessUserResponse;
use Src\Infrastructure\Api\User\Response\Login\LoginWrongUserResponse;

class LoginUserAction
{
    public const PARAM_EMAIL = 'email';
    public const PARAM_PASSWORD = 'password';

    public const ERROR_CREDENTIALS = 'INVALID_CREDENTIALS';
    public const ERROR_STATUS = 'INVALID_STATUS';
    public const ERROR_SERVER = 'SERVER_ERROR';

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
        $error = '';

        try {

            $user = $this->userLoginService->findUserByEmailAndPassword(new UserEmail($email), new UserPassword($password));
            $userSession = $this->userSessionLoginService->startSessionByUser($user);

        } catch (LoginUserActionUserNotFoundWithPasswordException $actionUserNotFoundWithPasswordException) {
            // @todo log this exceptions in Sentry
            $error = self::ERROR_CREDENTIALS;
        } catch (LoginUserActionUserWrongStatusException $actionUserWrongStatusException) {
            $error = self::ERROR_STATUS;
        } catch (\Throwable $throwable) {
            $error = self::ERROR_SERVER;
        }

        return $userSession ? new LoginSuccessUserResponse($userSession->getId()) : new LoginWrongUserResponse($error);
    }
}
