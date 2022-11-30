<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserVerifyToken\Validators\Uuid;

use Src\Domain\Properties\IProperty;
use Src\Domain\Properties\Validators\IPropertyValidator;

class UserVerifyTokenPropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserVerifyTokenPropertyWrongFormatException
     */
    public function validate(): void
    {
        if (!is_string($this->property->value())) {
            throw new UserVerifyTokenPropertyWrongFormatException();
        }
    }
}
