<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmail;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\UserEmail\Validators\UserEmailRegexPropertyValidator\UserEmailRegexPropertyValidator;

class UserEmail extends AbstractProperty implements IUserEmail, IProperty
{
    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
        $this->sanitize();
        $this->validate();
    }

    public function sanitize(): void
    {
        $this->email = trim($this->email);
        $this->email = strtolower($this->email);
    }

    public function validate(): void
    {
        $this->addValidator(new UserEmailRegexPropertyValidator($this));
        $this->executeValidators();
    }

    public function value(): string
    {
        return $this->email;
    }
}
