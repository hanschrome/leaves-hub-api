<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionUserId\Validators;

use Src\Domain\Properties\IProperty;
use Src\Domain\Properties\Validators\IPropertyValidator;

class UserSessionUserIdValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserSessionUserIdWrongUuidException
     */
    public function validate(): void
    {
        if (!is_string($this->property->value())) {
            throw new UserSessionUserIdWrongUuidException();
        }
    }
}
