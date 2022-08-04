<?php

declare(strict_types=1);

namespace Src\Domain\USerSession\Properties\UserSessionUpdatedAt\Validators;

use Src\Domain\Properties\AbstractTimestamp\TimestampPropertyRangeValidator;
use Src\Domain\Validators\IPropertyValidator;

class UserSessionUpdateAtValidator extends TimestampPropertyRangeValidator implements IPropertyValidator
{
    /**
     * @throws UserSessionUpdatedAtWrongRangeException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()) {
            throw new UserSessionUpdatedAtWrongRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
