<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod;

class UserAccountRecoveryMethod implements IUserAccountRecoveryMethod
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
}
