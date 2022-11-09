<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\VerifyEmail\Action;

use Src\Domain\User\Properties\UserId\UserId;
use Src\Domain\User\Properties\UserVerifyToken\UserVerifyToken;
use Src\Domain\User\Services\VerifyEmail\IUserVerifyEmailService;
use Src\Infrastructure\Api\User\Response\IResponse;
use Src\Infrastructure\Api\User\Response\VerifyEmail\VerifyEmailUserResponse;

class VerifyEmailUserAction
{
    public const PARAM_UUID = 'uuid';
    public const PARAM_VERIFY_TOKEN = 'verifyToken';
    private IUserVerifyEmailService $userVerifyEmailService;

    public function __construct(IUserVerifyEmailService $userVerifyEmailService)
    {
        $this->userVerifyEmailService = $userVerifyEmailService;
    }

    public function __invoke(array $requestJsonBody): IResponse
    {
        $userUuid = $requestJsonBody[self::PARAM_UUID];
        $verifyToken = $requestJsonBody[self::PARAM_VERIFY_TOKEN];

        $successful = true;

        try {
            $this->userVerifyEmailService->verifyUserByIdAndToken(new UserId($userUuid), new UserVerifyToken($verifyToken));
        } catch (\Throwable $throwable) { // @todo control in a better way this exception
            $successful = false;
        }

        return new VerifyEmailUserResponse(null, $successful);
    }
}
