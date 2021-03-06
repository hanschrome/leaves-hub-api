<?php

declare(strict_types=1);

namespace Src\Infrastructure\Api\Response;

class RegisterUserResponse implements IResponse
{
    private ?int $errorCode;
    private bool $success;

    public function __construct(?int $errorCode, bool $success)
    {
        $this->errorCode = $errorCode;
        $this->success = $success;
    }

    public function toArray(): array
    {
        return [
            'error_code' => $this->errorCode,
            'is_success' => $this->success
        ];
    }
}
