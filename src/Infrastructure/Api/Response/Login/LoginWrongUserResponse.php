<?php

declare(strict_types=1);

namespace Src\Infrastructure\Api\Response\Login;

use Src\Infrastructure\Api\Response\IResponse;

class LoginWrongUserResponse implements IResponse
{
    function toArray(): array
    {
        return [];
    }
}
