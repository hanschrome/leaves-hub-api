<?php

declare(strict_types=1);

namespace Src\Domain\USerSession\Properties\UserSessionExpirationDate;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;

class UserSessionExpirationDate extends AbstractTimestampProperty implements IProperty, IUserSessionExpirationDate
{
    private ?int $timestamp;

    public function __construct(?int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {

    }

    public function value(): ?int
    {
        return $this->timestamp;
    }
}
