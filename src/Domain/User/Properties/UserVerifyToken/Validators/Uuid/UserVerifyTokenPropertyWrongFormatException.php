<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserVerifyToken\Validators\Uuid;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;
use Exception;

class UserVerifyTokenPropertyWrongFormatException extends Exception implements IPropertyException
{

}
