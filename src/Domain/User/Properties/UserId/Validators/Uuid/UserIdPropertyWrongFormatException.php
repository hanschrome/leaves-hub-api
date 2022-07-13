<?php

namespace Src\Domain\User\Properties\Validators;

use Src\Domain\Validators\Exceptions\IPropertyException;

class UserIdPropertyWrongFormatException extends \Exception implements IPropertyException
{

}
