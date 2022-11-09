<?php

declare(strict_types=1);

namespace Src\Domain\Properties;

use Src\Domain\Properties\Validators\IPropertyValidator;

class AbstractProperty
{
    /**
     * @var array IPropertyValidator[]
     */
    private array $validators = [];

    protected function addValidator(IPropertyValidator $propertyValidator): void
    {
        $this->validators[] = $propertyValidator;
    }

    protected function executeValidators(): void
    {
        foreach ($this->validators as $validator) {
            $validator->validate();
        }
    }
}
