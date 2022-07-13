<?php

namespace Src\Domain\User\Properties\Validators;

use Src\Domain\Properties\IProperty;
use Src\Domain\Validators\IPropertyValidator;

class UserIdPropertyValidator implements IPropertyValidator
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
