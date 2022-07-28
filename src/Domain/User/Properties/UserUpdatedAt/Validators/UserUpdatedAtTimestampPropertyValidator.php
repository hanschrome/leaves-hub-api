<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserUpdatedAt\Validators;

use Src\Domain\Properties\AbstractTimestamp\TimestampPropertyRangeValidator;

class UserUpdatedAtTimestampPropertyValidator extends TimestampPropertyRangeValidator
{
    /**
     * @throws UserUpdatedAtTimestampPropertyWrongRangeException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()) {
            throw new UserUpdatedAtTimestampPropertyWrongRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
