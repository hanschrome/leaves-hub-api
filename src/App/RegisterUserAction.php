<?php

declare(strict_types=1);

namespace Src\App;

use Src\Infrastructure\Api\Response\IResponse;
use Src\Infrastructure\Api\Response\RegisterUserResponse;

class RegisterUserAction
{
    public function __invoke(): IResponse
    {


        return new RegisterUserResponse(null, true);
    }
}
