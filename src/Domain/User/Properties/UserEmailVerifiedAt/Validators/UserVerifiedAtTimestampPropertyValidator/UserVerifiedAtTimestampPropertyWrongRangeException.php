<?php

declare(strict_types=1);

namespace Src\Domain\Properties\User\Properties\UserEmailVerifiedAt\Validators;

use Src\Domain\Properties\AbstractTimestamp\TimestampPropertyRangeException;

class UserVerifiedAtTimestampPropertyWrongRangeException extends TimestampPropertyRangeException
{
}
