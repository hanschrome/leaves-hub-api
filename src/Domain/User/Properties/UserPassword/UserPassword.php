<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserPassword;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\UserPassword\Validators\UserPasswordHashPropertyValidator\UserPasswordHashPropertyValidator;

class UserPassword extends AbstractProperty implements IProperty, IUserPassword
{
    private string $password;

    public function __construct(string $password)
    {
        $this->password = $password; // @todo cipher password
        $this->sanitize();
        $this->validate();
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        $this->addValidator(new UserPasswordHashPropertyValidator($this));
        $this->executeValidators();
    }

    public function value(): string
    {
        return $this->password;
    }
}
