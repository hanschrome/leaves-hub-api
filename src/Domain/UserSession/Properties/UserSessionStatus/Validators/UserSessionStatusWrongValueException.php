<?php

namespace Src\Domain\UserSession\Properties\UserSessionStatus\Validators;

use Exception;
use Src\Domain\Validators\Exceptions\IPropertyException;

class UserSessionStatusWrongValueException extends Exception implements IPropertyException
{

}
