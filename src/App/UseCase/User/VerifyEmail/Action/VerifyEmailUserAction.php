<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\VerifyEmail\Action;

use Src\Domain\User\Properties\UserId;
use Src\Domain\User\Properties\UserVerifyToken\UserVerifyToken;
use Src\Domain\User\Services\VerifyEmail\IUserVerifyEmailService;
use Src\Infrastructure\Api\Response\IResponse;
use Src\Infrastructure\Api\User\Response\VerifyEmail\VerifyEmailUserResponse;

class VerifyEmailUserAction
{
    private IUserVerifyEmailService $userVerifyEmailService;

    public function __construct(IUserVerifyEmailService $userVerifyEmailService)
    {
        $this->userVerifyEmailService = $userVerifyEmailService;
    }

    public function __invoke(array $requestJsonBody): IResponse
    {
        $userUuid = $requestJsonBody['uuid'];
        $verifyToken = $requestJsonBody['verifyToken'];

        $successful = true;

        try {
            $this->userVerifyEmailService->verifyUserByIdAndToken(new UserId($userUuid), new UserVerifyToken($verifyToken));
        } catch (\Throwable $throwable) {
            $successful = false;
        }

        return new VerifyEmailUserResponse(null, $successful);
    }
}
