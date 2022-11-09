<?php

declare(strict_types=1);

namespace Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator;

use Exception;
use Src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator\TimestampPropertyRangeException;
use Src\Domain\Properties\IProperty;
use Src\Domain\Properties\Validators\IPropertyValidator;

class TimestampPropertyRangeValidator implements IPropertyValidator
{
    protected IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws TimestampPropertyRangeException
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()->getTimestamp()) {
            throw new TimestampPropertyRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
