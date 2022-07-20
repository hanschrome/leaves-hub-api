<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmail;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;

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
    }

    public function validate(): void
    {
        // $this->addValidator(null);
        $this->executeValidators();
    }

    public function value(): string
    {
        return $this->email;
    }
}
