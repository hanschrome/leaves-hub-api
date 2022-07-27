<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmailVerifiedAt;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;

class UserVerifiedAt extends AbstractTimestampProperty implements IProperty, IUserVerifiedAt
{
    private ?int $userVerifiedAt;

    public function __construct(?int $userVerifiedAt = null)
    {
        $this->userVerifiedAt = $userVerifiedAt;
    }

    public function sanitize(): void
    {
        // not needed
    }

    public function value(): ?int
    {
        return $this->userVerifiedAt;
    }
}
