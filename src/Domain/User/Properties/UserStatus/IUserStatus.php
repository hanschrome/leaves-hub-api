<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserStatus;

interface IUserStatus
{
    public function value(): string;
}
