<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserStatus\Validators\UserStatusPropertyValidator;

use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\UserStatus\UserStatus;
use Src\Domain\Validators\IPropertyValidator;

class UserStatusPropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserStatusWrongUserStatus
     */
    public function validate(): void
    {
        if (!in_array($this->property->value(), UserStatus::ALL)) {
            throw new UserStatusWrongUserStatus();
        }
    }
}
