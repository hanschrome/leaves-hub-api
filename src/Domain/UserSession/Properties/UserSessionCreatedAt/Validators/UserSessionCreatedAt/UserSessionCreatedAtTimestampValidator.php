<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionCreatedAt\Validators\UserSessionCreatedAt;

use Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\TimestampPropertyRangeValidator;

class UserSessionCreatedAtTimestampValidator extends TimestampPropertyRangeValidator
{
    /**
     * @throws UserSessionCreatedAtWrongTimestampException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()) {
            throw new UserSessionCreatedAtWrongTimestampException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
