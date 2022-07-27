<?php

declare(strict_types=1);

namespace Src\Domain\Properties\User\Properties\UserEmailVerifiedAt\Validators;

use Src\Domain\Validators\Exceptions\IPropertyException;

class UserVerifiedAtTimestampPropertyWrongRangeException extends \Exception implements IPropertyException
{

}
