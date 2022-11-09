<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionUpdatedAt\Validators;

use Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\TimestampPropertyRangeException;

class UserSessionUpdatedAtWrongRangeException extends TimestampPropertyRangeException
{

}
