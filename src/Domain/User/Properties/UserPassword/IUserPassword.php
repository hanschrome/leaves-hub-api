<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserPassword;

interface IUserPassword
{
    public function __construct(string $password);

    public function value(): string;
}
