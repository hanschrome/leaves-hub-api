<?php

declare(strict_types=1);

namespace Src\App;

use Src\App\UseCase\User\Registration\Exception\RegisterUserActionNotVerifiedUserIntentException;
use Src\App\UseCase\User\Registration\Exception\RegisterUserActionVerifiedUserIntentException;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Services\IUserRegistrationService;
use Src\Infrastructure\Api\Response\IResponse;
use Src\Infrastructure\Api\Response\Register\RegisterUserErrorResponse;
use Src\Infrastructure\Api\Response\RegisterUserResponse;
use Exception;
use Throwable;

class RegisterUserAction
{
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
        $emailRawRequest = $requestJsonBody['email'];
        $response = new RegisterUserResponse(null, true);

        try {
            $this->iUserRegistrationService->registerUserByEmail(new UserEmail($emailRawRequest));
        } catch (RegisterUserActionNotVerifiedUserIntentException $exception) {
            $response = new RegisterUserErrorResponse(
                200,
                RegisterUserErrorResponse::KEY_RESPONSE_NOT_VERIFIED_USER_INTENT,
                false
            );
        } catch (RegisterUserActionVerifiedUserIntentException $exception) {
            $response = new RegisterUserErrorResponse(
                200,
                RegisterUserErrorResponse::KEY_RESPONSE_VERIFIED_USER_INTENT,
                false
            );
        } catch (Throwable $throwable) { // please better error catching :laugh
            $response = new RegisterUserErrorResponse(
                500,
                RegisterUserErrorResponse::KEY_RESPONSE_INTERNAL_ERROR,
                false
            );
        }

        return $response;
    }
}
