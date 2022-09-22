<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\ResetPassword\Action;

use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Services\ResetPassword\IUserResetPasswordService;
use Src\Infrastructure\Api\Response\IResponse;
use Src\Infrastructure\Api\User\Response\ResetPassword\ResetPasswordUserResponse;

class ResetPasswordUserAction
{
    private IUserResetPasswordService $userResetPasswordService;

    public function __construct(IUserResetPasswordService $userResetPasswordService)
    {
        $this->userResetPasswordService = $userResetPasswordService;
    }

    public function __invoke(array $requestJsonBody): IResponse
    {
        $email = $requestJsonBody['email'];

        $success = $this->userResetPasswordService->resetPasswordByEmail(new UserEmail($email));

        return new ResetPasswordUserResponse(null, $success);
    }
}
