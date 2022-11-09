<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmailVerifiedAt\Validators\UserVerifiedAtTimestampPropertyValidator;

use Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\TimestampPropertyRangeException;

class UserVerifiedAtTimestampPropertyWrongRangeException extends TimestampPropertyRangeException
{
}
