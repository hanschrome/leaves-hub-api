<?php

namespace Src\Domain\Properties\AbstractTimestamp;

use Exception;
use Src\Domain\Validators\Exceptions\IPropertyException;

class TimestampPropertyRangeException extends Exception implements IPropertyException
{

}
