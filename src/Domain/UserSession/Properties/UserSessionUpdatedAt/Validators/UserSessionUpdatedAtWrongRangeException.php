<?php

declare(strict_types=1);

namespace Src\Domain\USerSession\Properties\UserSessionUpdatedAt\Validators;

use Src\Domain\Properties\AbstractTimestamp\TimestampPropertyRangeException;

class UserSessionUpdatedAtWrongRangeException extends TimestampPropertyRangeException
{

}
