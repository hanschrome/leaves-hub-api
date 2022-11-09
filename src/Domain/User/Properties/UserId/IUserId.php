<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserId;

interface IUserId
{
    public function __construct(string $userId);

    public function value(): string;
}
