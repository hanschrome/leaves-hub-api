<?php

namespace Src\Domain\Properties;

interface IProperty
{
    public function sanitize(): void;

    public function validate(): void;

    public function value(): mixed;
}
