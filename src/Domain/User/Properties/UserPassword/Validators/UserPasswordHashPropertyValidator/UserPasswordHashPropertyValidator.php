<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserPassword\Validators\UserPasswordHashPropertyValidator;

use Src\Domain\Properties\IProperty;
use Src\Domain\Properties\Validators\IPropertyValidator;

class UserPasswordHashPropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserPasswordHashWrongFormatException
     */
    public function validate(): void
    {
        if (
            !is_string($this->property->value()) ||
            strlen($this->property->value()) != strlen(hash('sha512', '1'))
        ) {
            throw new UserPasswordHashWrongFormatException();
        }
    }
}
