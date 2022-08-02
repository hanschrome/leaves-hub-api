<?php

declare(strict_types=1);

namespace Src\Domain\User\Properties\UserStatus;

use Src\Domain\Properties\AbstractProperty;
use Src\Domain\Properties\IProperty;
use Src\Domain\User\Properties\UserStatus\Validators\UserStatusPropertyValidator\UserStatusPropertyValidator;

class UserStatus extends AbstractProperty implements IProperty, IUserStatus
{
    public const UNSIGNED = 1;
    public const ACTIVE = 2;
    public const NOT_ACTIVE = 3;

    public const ALL = [
        self::UNSIGNED,
        self::ACTIVE,
        self::NOT_ACTIVE
    ];

    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function sanitize(): void {}

    public function validate(): void
    {
        $this->addValidator(new UserStatusPropertyValidator($this));
        $this->executeValidators();
    }

    public function value(): int
    {
        return $this->value;
    }
}
