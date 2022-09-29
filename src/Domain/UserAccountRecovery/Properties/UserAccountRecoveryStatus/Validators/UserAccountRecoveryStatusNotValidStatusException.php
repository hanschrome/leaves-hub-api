<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus\Validators;

use Src\Domain\Validators\Exceptions\IPropertyException;

class UserAccountRecoveryStatusNotValidStatusException extends \Exception implements IPropertyException
{

}
