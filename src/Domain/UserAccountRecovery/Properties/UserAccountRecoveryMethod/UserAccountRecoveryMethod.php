<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\Validators\UserAccountRecoveryMethodPropertyValidator;

class UserAccountRecoveryMethod extends AbstractProperty implements IProperty, IUserAccountRecoveryMethod
{
    public const METHOD_EMAIL_CODE = 1;
    public const METHODS = [
        self::METHOD_EMAIL_CODE
    ];

    private int $method;

    public function __construct(int $method)
    {
        $this->method = $method;
    }

    public function value(): int
    {
        return $this->method;
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        $this->addValidator(new UserAccountRecoveryMethodPropertyValidator($this));
        $this->executeValidators();
    }
}
