<?php

declare(strict_types=1);

namespace Src\Infrastructure\Api\Response\Login;

use Src\Domain\UserSession\Properties\UserSessionId\IUserSessionId;
use Src\Infrastructure\Api\Response\IResponse;

class LoginSuccessUserResponse implements IResponse
{
    private IUserSessionId $userSessionId;

    public function __construct(IUserSessionId $userSessionId)
    {
        $this->userSessionId = $userSessionId;
    }

    function toArray(): array
    {
        return [
            'session_id' => $this->userSessionId->value()
        ];
    }
}
