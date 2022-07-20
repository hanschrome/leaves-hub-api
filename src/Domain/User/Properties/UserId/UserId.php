<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\Validators\UserIdPropertyValidator;

class UserId extends AbstractProperty implements IProperty, IUserId
{
    private string $userId;

    public function __construct(string $userId)
    {
        $this->userId = $userId;
        $this->sanitize();
        $this->validate();
    }

    public function sanitize(): void
    {
        $this->userId = trim($this->userId);
    }

    public function validate(): void
    {
        $this->addValidator(new UserIdPropertyValidator($this));
        $this->executeValidators();
    }

    public function value(): string
    {
        return $this->userId;
    }
}
