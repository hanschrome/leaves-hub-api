<?php

declare(strict_types=1);

namespace Src\Infrastructure\Api\Response\Register;

use Src\Infrastructure\Api\Response\IResponse;
use Exception;

class RegisterUserErrorResponse implements IResponse
{
    const KEY_RESPONSE_NOT_VERIFIED_USER_INTENT = 'NOT_VERIFIED_USER_INTENT';
    const KEY_RESPONSE_VERIFIED_USER_INTENT = 'VERIFIED_USER_INTENT';
    const KEY_RESPONSE_INTERNAL_ERROR = 'INTERNAL_ERROR';

    const VALID_KEYS = [
        self::KEY_RESPONSE_NOT_VERIFIED_USER_INTENT,
        self::KEY_RESPONSE_VERIFIED_USER_INTENT,
        self::KEY_RESPONSE_INTERNAL_ERROR
    ]

    private ?int $errorCode;
    private string $keyResponse;
    private bool $success;

    /**
     * @throws Exception
     */
    public function __construct(?int $errorCode, string $keyResponse, bool $success)
    {
        $this->errorCode = $errorCode;
        $this->keyResponse = $keyResponse;
        $this->success = $success;

        $this->validate();
    }

    /**
     * @throws Exception
     */
    private function validate() {
        if (!in_array($this->keyResponse, self::VALID_KEYS)) {
            throw new Exception('NOT VALID RESPONSE KEY IN REGISTER USER RESPONSE.');
        }
    }

    public function toArray(): array
    {
        return [
            'error_code' => $this->errorCode,
            'key' => $this->keyResponse,
            'is_success' => $this->success
        ];
    }
}
