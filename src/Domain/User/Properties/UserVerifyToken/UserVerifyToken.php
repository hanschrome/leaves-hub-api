<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserVerifyToken;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;

class UserVerifyToken extends AbstractProperty implements IProperty, IUserVerifyToken
{
    private string $value;

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        // TODO: Implement validate() method.
    }

    public function value(): mixed
    {
        // TODO: Implement value() method.
    }
}
