<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmail;

interface IUserEmail
{
    public function __construct(string $email);
}
