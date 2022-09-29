<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryCreatedAt;

use Src\Domain\Properties\AbstractTimestamp\AbstractTimestampProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryCreatedAt\Validators\UserAccountRecoveryStatusCreatedAtPropertyValidator;

class UserAccountRecoveryCreatedAt extends AbstractTimestampProperty implements IProperty, IUserAccountRecoveryCreatedAt
{
    private int $timestamp;

    public function __construct(?int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function value(): int
    {
        return $this->timestamp;
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        parent::validate();
        $this->addValidator(new UserAccountRecoveryStatusCreatedAtPropertyValidator($this));
        $this->executeValidators();
    }
}
