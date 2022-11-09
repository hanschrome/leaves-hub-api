<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\Validators;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;

class UserAccountRecoveryMethodNotValidMethodException extends \Exception implements IPropertyException
{

}
