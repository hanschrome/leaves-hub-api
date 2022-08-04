<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionStatus\Validators;

use Src\Domain\Properties\IProperty;
use Src\Domain\UserSession\Properties\UserSessionStatus\IUserSessionStatus;
use Src\Domain\Validators\IPropertyValidator;

class UserSessionStatusValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserSessionStatusWrongValueException
     */
    public function validate(): void
    {
        if(!in_array($this->property->value(), IUserSessionStatus::STATUS_ALL)) {
            throw new UserSessionStatusWrongValueException();
        }
    }
}
