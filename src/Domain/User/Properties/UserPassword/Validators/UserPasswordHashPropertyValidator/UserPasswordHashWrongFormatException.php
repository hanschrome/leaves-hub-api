<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserPassword\Validators\UserPasswordHasPropertyValidator;

use Exception;
use Src\Domain\Validators\Exceptions\IPropertyException;

class UserPasswordHashWrongFormatException extends Exception implements IPropertyException
{

}
