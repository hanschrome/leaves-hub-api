<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmailVerifiedAt;

interface IUserVerifiedAt
{
    public function __construct(int $userVerifiedAt);

    public function value(): int;
}
