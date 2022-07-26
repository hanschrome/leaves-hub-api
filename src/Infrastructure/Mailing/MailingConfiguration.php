<?php

declare(strict_types=1);

namespace Src\Infrastructure\Mailing;

use Exception;

class MailingConfiguration
{
    private bool $smtpDebug;
    private bool $smtpAuth;
    private string $smtpSecure;
    private int $port;
    private string $host;
    private string $username;
    private string $password;

    const SMTP_SECURE_ENUM = ['tls', 'ssl'];

    /**
     * @param bool $smtpDebug
     * @param bool $smtpAuth
     * @param string $smtpSecure
     * @param int $port
     * @param string $host
     * @param string $username
     * @param string $password
     * @throws Exception
     */
    public function __construct(bool $smtpDebug, bool $smtpAuth, string $smtpSecure, int $port, string $host, string $username, string $password)
    {
        $this->smtpDebug = $smtpDebug;
        $this->smtpAuth = $smtpAuth;
        $this->smtpSecure = $smtpSecure;
        $this->port = $port;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;

        $this->validate();
    }

    /**
     * @throws Exception
     */
    private function validate(): void
    {
        if (!in_array($this->getSmtpSecure(), self::SMTP_SECURE_ENUM)) {
            throw new Exception();
        }
    }

    public function isSmtpDebug(): bool
    {
        return $this->smtpDebug;
    }

    public function isSmtpAuth(): bool
    {
        return $this->smtpAuth;
    }

    public function getSmtpSecure(): string
    {
        return $this->smtpSecure;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
