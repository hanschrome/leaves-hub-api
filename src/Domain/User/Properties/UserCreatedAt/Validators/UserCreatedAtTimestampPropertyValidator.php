<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserCreatedAt\Validators;

use Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\TimestampPropertyRangeValidator;

class UserCreatedAtTimestampPropertyValidator extends TimestampPropertyRangeValidator
{
    /**
     * @throws UserCreatedAtTimestampPropertyRangeException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()) {
            throw new UserCreatedAtTimestampPropertyRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
