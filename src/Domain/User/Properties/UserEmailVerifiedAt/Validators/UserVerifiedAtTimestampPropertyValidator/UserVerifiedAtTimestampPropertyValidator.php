<?php

declare(strict_types=1);

namespace Src\Domain\Properties\User\Properties\UserEmailVerifiedAt\Validators;

use Src\Domain\Properties\AbstractTimestamp\TimestampPropertyRangeValidator;

class UserVerifiedAtTimestampPropertyValidator extends TimestampPropertyRangeValidator
{
    /**
     * @throws UserVerifiedAtTimestampPropertyWrongRangeException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()) {
            throw new UserVerifiedAtTimestampPropertyWrongRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
