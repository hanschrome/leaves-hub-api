<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\Validators\Uuid;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;

class UserIdPropertyWrongFormatException extends \Exception implements IPropertyException
{

}
