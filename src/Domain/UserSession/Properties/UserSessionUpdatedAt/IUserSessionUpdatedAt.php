<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionUpdatedAt;

interface IUserSessionUpdatedAt
{
    public function value(): ?int;
}
