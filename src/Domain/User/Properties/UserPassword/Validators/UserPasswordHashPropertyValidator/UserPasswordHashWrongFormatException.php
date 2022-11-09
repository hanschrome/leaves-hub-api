<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserPassword\Validators\UserPasswordHashPropertyValidator;

use Exception;
use Src\Domain\Properties\Validators\Exceptions\IPropertyException;

class UserPasswordHashWrongFormatException extends Exception implements IPropertyException
{

}
