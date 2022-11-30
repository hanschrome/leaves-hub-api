<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserUpdatedAt\Validators\UserUpdatedAtTimestampPropertyValidator;

use Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\TimestampPropertyRangeValidator;

class UserUpdatedAtTimestampPropertyValidator extends TimestampPropertyRangeValidator
{
    /**
     * @throws UserUpdatedAtTimestampPropertyWrongRangeException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()->timestamp) {
            throw new UserUpdatedAtTimestampPropertyWrongRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
