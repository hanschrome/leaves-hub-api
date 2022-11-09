<?php

namespace Src\Domain\User\Properties\UserId\Validators\Uuid;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;

class UserIdPropertyWrongFormatException extends \Exception implements IPropertyException
{

}
