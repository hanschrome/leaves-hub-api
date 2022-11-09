<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionId\Validators;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;

class UserSessionIdException extends \Exception implements IPropertyException
{

}
