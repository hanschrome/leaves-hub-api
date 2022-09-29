<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecoverySecretCode\Validators;

use Src\Domain\Validators\Exceptions\IPropertyException;

class UserAccountRecoverySecretCodeWrongFormatException extends \Exception implements IPropertyException
{

}
