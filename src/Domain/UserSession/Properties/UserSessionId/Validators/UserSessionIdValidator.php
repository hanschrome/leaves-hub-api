<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionId\Validators;

use Src\Domain\Properties\IProperty;
use Src\Domain\UserSession\Properties\UserSessionId\Validators\UserSessionIdException;
use Src\Domain\Properties\Validators\IPropertyValidator;

class UserSessionIdValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserSessionIdException
     */
    public function validate(): void
    {
        if (!is_string($this->property->value())) {
            throw new UserSessionIdException();
        }
    }
}
