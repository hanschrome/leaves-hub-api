<?php

declare(strict_types=1);

namespace Src\Domain\Properties\User\Properties\UserEmailVerifiedAt\Validators;

use Src\Domain\Properties\IProperty;
use Src\Domain\Validators\IPropertyValidator;

class UserVerifiedAtTimestampPropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserVerifiedAtTimestampPropertyWrongRangeException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()) {
            throw new UserVerifiedAtTimestampPropertyWrongRangeException(
                'Property UserVerifiedAt is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
