<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\USerSessionUserId\Validators;

use Src\Domain\Validators\Exceptions\IPropertyException;

class UserSessionUserIdWrongUuidException extends \Exception implements IPropertyException
{

}
