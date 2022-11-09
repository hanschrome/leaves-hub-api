<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionExpirationDate;

interface IUserSessionExpirationDate
{
    public function value(): ?int;
}
