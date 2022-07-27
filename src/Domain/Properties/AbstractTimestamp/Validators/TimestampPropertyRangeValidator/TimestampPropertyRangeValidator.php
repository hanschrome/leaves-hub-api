<?php

declare(strict_types=1);

namespace Src\Domain\Properties\AbstractTimestamp;

use Exception;
use Src\Domain\Properties\IProperty;
use Src\Domain\Validators\IPropertyValidator;

class TimestampPropertyRangeValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws Exception
     */
    public function validate(): void
    {
        if ($this->property->value() <= 0 || $this->property->value() > now()) {
            throw new TimestampPropertyRangeException(
                'Property ' . get_class($this->property) . ' is out of range: (' . $this->property->value() . ')'
            );
        }
    }
}
