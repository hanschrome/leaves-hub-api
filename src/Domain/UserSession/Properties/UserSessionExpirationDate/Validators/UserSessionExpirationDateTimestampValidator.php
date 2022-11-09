<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionExpirationDate\Validators;

use Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\TimestampPropertyRangeValidator;

class UserSessionExpirationDateTimestampValidator extends TimestampPropertyRangeValidator
{
    /**
     * @throws UserSessionExpirationDateWrongRangeException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()) {
            throw new UserSessionExpirationDateWrongRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
