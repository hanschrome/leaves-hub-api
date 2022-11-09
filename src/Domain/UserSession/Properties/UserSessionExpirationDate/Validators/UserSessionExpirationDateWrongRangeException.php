<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionExpirationDate\Validators;

use Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\TimestampPropertyRangeException;

class UserSessionExpirationDateWrongRangeException extends TimestampPropertyRangeException
{

}
