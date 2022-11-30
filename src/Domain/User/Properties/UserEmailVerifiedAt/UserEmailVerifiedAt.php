<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmailVerifiedAt;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\UserEmailVerifiedAt\Validators\UserVerifiedAtTimestampPropertyValidator\UserVerifiedAtTimestampPropertyValidator;

class UserEmailVerifiedAt extends AbstractTimestampProperty implements IProperty, IUserEmailVerifiedAt
{
    private ?int $userVerifiedAt;

    public function __construct(?int $userVerifiedAt = null)
    {
        $this->userVerifiedAt = $userVerifiedAt;
        $this->sanitize();
        $this->validate();
    }

    public function sanitize(): void
    {
        // not needed
    }

    public function validate(): void
    {
        $this->addValidator(new UserVerifiedAtTimestampPropertyValidator($this));
        $this->executeValidators();
    }

    public function value(): ?int
    {
        return $this->userVerifiedAt;
    }
}