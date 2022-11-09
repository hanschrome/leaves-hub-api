<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryCreatedAt\Validators;

use Src\Domain\Properties\IProperty;
use Src\Domain\Properties\Validators\IPropertyValidator;

class UserAccountRecoveryStatusCreatedAtPropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserAccountRecoveryStatusCreatedAtPropertyRangeException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()) {
            throw new UserAccountRecoveryStatusCreatedAtPropertyRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
