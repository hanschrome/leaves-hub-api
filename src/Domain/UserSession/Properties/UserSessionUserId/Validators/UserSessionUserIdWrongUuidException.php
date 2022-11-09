<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionUserId\Validators;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;

class UserSessionUserIdWrongUuidException extends \Exception implements IPropertyException
{

}
