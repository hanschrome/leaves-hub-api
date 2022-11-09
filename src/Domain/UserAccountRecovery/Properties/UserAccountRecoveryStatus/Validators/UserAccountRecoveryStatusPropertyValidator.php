<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus\Validators;

use Src\Domain\Properties\IProperty;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus\UserAccountRecoveryStatus;
use Src\Domain\Properties\Validators\IPropertyValidator;

class UserAccountRecoveryStatusPropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserAccountRecoveryStatusNotValidStatusException
     */
    public function validate(): void
    {
        if (!in_array($this->property->value(), UserAccountRecoveryStatus::STATUSES)) {
            throw new UserAccountRecoveryStatusNotValidStatusException($this->property->value());
        }
    }
}
