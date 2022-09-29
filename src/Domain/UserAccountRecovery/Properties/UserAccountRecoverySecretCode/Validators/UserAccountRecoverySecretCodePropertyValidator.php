<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecoverySecretCode\Validators;

use Src\Domain\Properties\IProperty;
use Src\Domain\Validators\IPropertyValidator;

class UserAccountRecoverySecretCodePropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserAccountRecoverySecretCodeWrongFormatException
     */
    public function validate(): void
    {
        if (empty($this->property->value())) {
            throw new UserAccountRecoverySecretCodeWrongFormatException($this->property->value());
        }
    }
}
