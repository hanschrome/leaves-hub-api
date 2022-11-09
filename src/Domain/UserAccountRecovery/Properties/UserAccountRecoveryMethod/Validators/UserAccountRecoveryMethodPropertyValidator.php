<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\Validators;

use Src\Domain\Properties\IProperty;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\UserAccountRecoveryMethod;
use Src\Domain\Properties\Validators\IPropertyValidator;

class UserAccountRecoveryMethodPropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserAccountRecoveryMethodNotValidMethodException
     */
    public function validate(): void
    {
        if (!in_array($this->property->value(), UserAccountRecoveryMethod::METHODS)) {
            throw new UserAccountRecoveryMethodNotValidMethodException($this->property->value());
        }
    }
}
