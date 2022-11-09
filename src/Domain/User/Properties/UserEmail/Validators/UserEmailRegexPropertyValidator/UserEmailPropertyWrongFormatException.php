<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmail\Validators\UserEmailRegexPropertyValidator;

use Src\Domain\Properties\Validators\Exceptions\IPropertyException;

class UserEmailPropertyWrongFormatException extends \Exception implements IPropertyException
{

}
