<?php

declare(strict_types=1);

namespace Src\Infrastructure\Api\Response\Login;

use Src\Infrastructure\Api\Response\IResponse;

class LoginSuccessUserResponse implements IResponse
{
    function toArray(): array
    {
        return [
            'session_id' => ''
        ];
    }
}
