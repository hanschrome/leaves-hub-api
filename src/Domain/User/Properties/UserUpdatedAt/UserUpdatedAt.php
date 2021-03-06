<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserUpdatedAt;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\UserUpdatedAt\Validators\UserUpdatedAtTimestampPropertyValidator;

class UserUpdatedAt extends AbstractTimestampProperty implements IProperty, IUserUpdatedAt
{
    private ?int $timestamp;

    public function __construct(?int $timestamp = null)
    {
        $this->timestamp = $timestamp;
        $this->sanitize();
        $this->validate();
    }

    public function sanitize(): void
    {
        // --
    }

    public function validate(): void
    {
        $this->addValidator(new UserUpdatedAtTimestampPropertyValidator($this));
        $this->executeValidators();
    }

    public function value(): ?int
    {
        return $this->timestamp;
    }
}
