<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\ResetPassword\Action;

use Src\Infrastructure\Api\Response\IResponse;
use Src\Infrastructure\Api\User\Response\ResetPassword\ResetPasswordUserResponse;

class ResetPasswordUserAction
{
    public function __invoke(array $requestJsonBody): IResponse
    {
        return new ResetPasswordUserResponse(null, true);
    }
}
