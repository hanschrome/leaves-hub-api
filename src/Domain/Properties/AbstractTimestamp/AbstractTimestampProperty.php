<?php

declare(strict_types=1);

namespace Src\Domain\Properties\AbstractTimestamp;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;

abstract class AbstractTimestampProperty extends AbstractProperty implements IProperty, ITimestampProperty
{
    public function validate(): void
    {
        $this->addValidator(new TimestampPropertyRangeValidator($this));
        $this->executeValidators();
    }
}
