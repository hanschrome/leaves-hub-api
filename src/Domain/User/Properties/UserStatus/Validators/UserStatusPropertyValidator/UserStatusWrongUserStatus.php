<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserStatus\Validators\UserStatusPropertyValidator;

use Src\Domain\Validators\Exceptions\IPropertyException;
use Exception;

class UserStatusWrongUserStatus extends Exception implements IPropertyException
{

}
