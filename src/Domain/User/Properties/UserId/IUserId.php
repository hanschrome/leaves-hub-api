<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties;

interface IUserId
{
    public function __construct(string $userId);
}
