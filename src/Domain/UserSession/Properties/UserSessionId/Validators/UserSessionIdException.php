<?php

declare(strict_types=1);

namespace Src\Domain\UserSession\Properties\UserSessionId\Validator;

use Src\Domain\Validators\Exceptions\IPropertyException;

class UserSessionIdException extends \Exception implements IPropertyException
{

}
