<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserPassword\Validators\UserPasswordHashPropertyValidator;

use Src\Domain\Properties\IProperty;
use Src\Domain\Properties\Validators\IPropertyValidator;

class UserPasswordHashPropertyValidator implements IPropertyValidator
{
    public function __construct(IProperty $property)
    {
    }

    public function validate(): void
    {
        // TODO: Implement validate() method.
    }
}
