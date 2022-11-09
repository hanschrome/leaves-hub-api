<?php

namespace Src\Domain\Properties\Validators;

use Src\Domain\Properties\IProperty;

interface IPropertyValidator
{
    public function __construct(IProperty $property);

    public function validate(): void;
}
