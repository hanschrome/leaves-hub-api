<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserUpdatedAt;

interface IUserUpdatedAt
{
    public function value(): int;
}
