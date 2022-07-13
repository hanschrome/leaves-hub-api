<?php

namespace Src\Domain\Validators;

use Src\Domain\Properties\IProperty;

interface IPropertyValidator
{
    public function __construct(IProperty $property);

    public function validate(): void;
}
