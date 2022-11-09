<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserEmail\Validators\UserEmailRegexPropertyValidator;

use Src\Domain\Properties\IProperty;
use Src\Domain\Properties\Validators\IPropertyValidator;

class UserEmailRegexPropertyValidator implements IPropertyValidator
{
    private IProperty $property;

    public function __construct(IProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @throws UserEmailPropertyWrongFormatException
     */
    public function validate(): void
    {
        if(!preg_match('/^([a-z\d\+_\-]+)(\.[a-z\d\+_\-]+)*@([a-z\d\-]+\.)+[a-z]{2,6}$/ix', $this->property->value())) {
            throw new UserEmailPropertyWrongFormatException();
        }
    }
}
