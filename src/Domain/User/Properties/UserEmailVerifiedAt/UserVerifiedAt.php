<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmailVerifiedAt;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\Properties\User\Properties\UserEmailVerifiedAt\Validators\UserVerifiedAtTimestampPropertyValidator;

class UserVerifiedAt extends AbstractProperty implements IProperty, IUserVerifiedAt
{
    private int $userVerifiedAt;

    public function __construct(int $userVerifiedAt)
    {
        $this->userVerifiedAt = $userVerifiedAt;
    }

    public function sanitize(): void
    {
        // not needed
    }

    public function validate(): void
    {
        $this->addValidator(new UserVerifiedAtTimestampPropertyValidator($this));
        $this->validate();
    }

    public function value(): int
    {
        $this->userVerifiedAt;
    }
}
