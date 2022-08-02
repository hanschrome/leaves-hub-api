<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserVerifyToken;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\UserVerifyToken\Validators\Uuid\UserVerifyTokenPropertyValidator;

class UserVerifyToken extends AbstractProperty implements IProperty, IUserVerifyToken
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
        $this->sanitize();
        $this->validate();
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        $this->addValidator(new UserVerifyTokenPropertyValidator($this));
        $this->executeValidators();
    }

    public function value(): string
    {
        return $this->value;
    }
}
