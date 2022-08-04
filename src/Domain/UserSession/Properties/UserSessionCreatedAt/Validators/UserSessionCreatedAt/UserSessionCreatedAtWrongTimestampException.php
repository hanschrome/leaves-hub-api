<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionCreatedAt\Validators\UserSessionCreatedAt;

use Src\Domain\Properties\AbstractTimestamp\TimestampPropertyRangeException;

class UserSessionCreatedAtWrongTimestampException extends TimestampPropertyRangeException
{

}
