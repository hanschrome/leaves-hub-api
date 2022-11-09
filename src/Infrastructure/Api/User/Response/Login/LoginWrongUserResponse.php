<?php

declare(strict_types=1);

namespace Src\Infrastructure\Api\User\Response\Login;

use Src\Infrastructure\Api\User\Response\IResponse;

class LoginWrongUserResponse implements IResponse
{
    private string $error;

    public function __construct(string $error = '')
    {
        $this->error = $error;
    }

    function toArray(): array
    {
        return [
            'error' => $this->error
        ];
    }
}
