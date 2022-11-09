<?php

namespace Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator;

use Exception;
use Src\Domain\Properties\Validators\Exceptions\IPropertyException;

class TimestampPropertyRangeException extends Exception implements IPropertyException
{

}
