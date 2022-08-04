<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionUserId;

interface IUserSessionUserId
{
    public function value(): string;
}
