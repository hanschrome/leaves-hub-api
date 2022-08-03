<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionId;

interface IUserSessionId
{
    public function value(): string;
}
