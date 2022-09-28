<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\Validators\Uuid;

use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\Validators\UserIdPropertyWrongFormatException;
use Src\Domain\Validators\IPropertyValidator;

class UserAccountRecoveryIdPropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserIdPropertyWrongFormatException
     */
    public function validate(): void
    {
        if (!is_string($this->property->value())) {
            throw new UserIdPropertyWrongFormatException();
        }
    }
}
