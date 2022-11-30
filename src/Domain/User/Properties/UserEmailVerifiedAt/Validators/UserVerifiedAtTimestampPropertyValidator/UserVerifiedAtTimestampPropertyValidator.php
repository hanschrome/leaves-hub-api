<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmailVerifiedAt\Validators\UserVerifiedAtTimestampPropertyValidator;

use Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\TimestampPropertyRangeValidator;

class UserVerifiedAtTimestampPropertyValidator extends TimestampPropertyRangeValidator
{
    /**
     * @throws UserVerifiedAtTimestampPropertyWrongRangeException
     */
    public function validate(): void
    {
        if (($this->property->value() <= 0 || $this->property->value() > time()) && $this->property->value() !== null) {
            throw new UserVerifiedAtTimestampPropertyWrongRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
