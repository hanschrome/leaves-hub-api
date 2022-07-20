<?php

declare(strict_types=1);

namespace Src\App;

use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Services\IUserRegistrationService;
use Src\Infrastructure\Api\Response\IResponse;
use Src\Infrastructure\Api\Response\RegisterUserResponse;

class RegisterUserAction
{
    private IUserRegistrationService $iUserRegistrationService;

    public function __construct(IUserRegistrationService $iUserRegistrationService)
    {
        $this->iUserRegistrationService = $iUserRegistrationService;
    }

    public function __invoke(array $requestJsonBody): IResponse
    {
        $captchaToken = $requestJsonBody['captchaToken'];
        $emailRawRequest = $requestJsonBody['email'];

        try {
            $success = $this->iUserRegistrationService->registerUserByEmail(new UserEmail($emailRawRequest));
        } catch (\Throwable) {
            $success = false;
            // @todo
        }

        return new RegisterUserResponse(null, $success);
    }
}
