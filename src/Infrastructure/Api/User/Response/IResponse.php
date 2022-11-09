<?php

declare(strict_types=1);

namespace Src\Infrastructure\Api\User\Response;

interface IResponse
{
    function toArray(): array;
}
