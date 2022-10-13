<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator;

use Src\Domain\Properties\IProperty;

class DummyIProperty implements IProperty
{
    private int $timestamp;

    public function __construct(?int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function sanitize(): void
    {
        // TODO: Implement sanitize() method.
    }

    public function validate(): void
    {
        // TODO: Implement validate() method.
    }

    public function value(): int
    {
        return $this->timestamp;
    }
}
