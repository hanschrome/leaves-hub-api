<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoverySecretCode\Validators;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;

class UserAccountRecoverySecretCodeWrongFormatException extends \Exception implements IPropertyException
{

}
