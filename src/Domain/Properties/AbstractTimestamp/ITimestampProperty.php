<?php

declare(strict_types=1);

namespace Src\Domain\Properties\AbstractTimestamp;

interface ITimestampProperty
{
    public function __construct(?int $timestamp);

    public function value();
}
