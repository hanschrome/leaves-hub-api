<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Registration\Action;

use Src\App\UseCase\User\Registration\Exception\RegisterUserActionNotVerifiedUserIntentException;
use Src\App\UseCase\User\Registration\Exception\RegisterUserActionVerifiedUserIntentException;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Services\Registration\IUserRegistrationService;
use Exception;
use Src\Infrastructure\Api\User\Response\IResponse;
use Src\Infrastructure\Api\User\Response\Register\RegisterUserErrorResponse;
use Src\Infrastructure\Api\User\Response\Register\RegisterUserResponse;
use Throwable;

class RegisterUserAction
{
    public const PARAM_EMAIL = 'email';
    private IUserRegistrationService $iUserRegistrationService;

    public function __construct(IUserRegistrationService $iUserRegistrationService)
    {
        $this->iUserRegistrationService = $iUserRegistrationService;
    }

    /**
     * @throws Exception
     */
    public function __invoke(array $requestJsonBody): IResponse
    {
        // $captchaToken = $requestJsonBody['captchaToken'];
        $emailRawRequest = $requestJsonBody[self::PARAM_EMAIL];
        $response = new RegisterUserResponse(null, true);

        try {
            $this->iUserRegistrationService->registerUserByEmail(new UserEmail($emailRawRequest));
             // queue event for mail
        } catch (RegisterUserActionNotVerifiedUserIntentException $exception) { // @todo log this exceptions in Sentry
            $response = new RegisterUserErrorResponse(
                401,
                RegisterUserErrorResponse::KEY_RESPONSE_NOT_VERIFIED_USER_INTENT,
                false
            );
        } catch (RegisterUserActionVerifiedUserIntentException $exception) {
            $response = new RegisterUserErrorResponse(
                401,
                RegisterUserErrorResponse::KEY_RESPONSE_VERIFIED_USER_INTENT,
                false
            );
        } catch (Throwable $throwable) {
            $response = new RegisterUserErrorResponse(
                500,
                RegisterUserErrorResponse::KEY_RESPONSE_INTERNAL_ERROR,
                false
            );
        }

        return $response;
    }
}
