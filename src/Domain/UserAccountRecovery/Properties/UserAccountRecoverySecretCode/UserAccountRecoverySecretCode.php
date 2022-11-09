<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoverySecretCode;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoverySecretCode\Validators\UserAccountRecoverySecretCodePropertyValidator;

class UserAccountRecoverySecretCode extends AbstractProperty implements IProperty, IUserAccountRecoverySecretCode
{
    private string $secretCode;

    public function __construct(string $secretCode)
    {
        $this->secretCode = $secretCode;
    }

    public function value(): string
    {
        return $this->secretCode;
    }

    public function sanitize(): void
    {
        $this->secretCode = trim($this->secretCode);
    }

    public function validate(): void
    {
        $this->addValidator(new UserAccountRecoverySecretCodePropertyValidator($this));
        $this->executeValidators();
    }
}
