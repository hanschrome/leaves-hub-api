<?php

declare(strict_types=1);

namespace Src\Infrastructure\Api\User\Response\VerifyEmail;

use Src\Infrastructure\Api\User\Response\IResponse;

class VerifyEmailUserResponse implements IResponse
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
