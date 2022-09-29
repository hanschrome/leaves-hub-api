<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\Validators\Uuid\UserAccountRecoveryIdPropertyValidator;

class UserAccountRecoveryId extends AbstractProperty implements IProperty, IUserAccountRecoveryId
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function value(): string
    {
        return $this->id;
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        $this->addValidator(new UserAccountRecoveryIdPropertyValidator($this));
        $this->executeValidators();
    }
}
