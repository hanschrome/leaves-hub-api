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
    private string $fromMail;
    private string $fromName;

    const SMTP_SECURE_ENUM = [self::SMTP_SECURE_TLS, self::SMTP_SECURE_SSL];
    const SMTP_SECURE_TLS = 'tls';
    const SMTP_SECURE_SSL = 'ssl';

    /**
     * @throws Exception
     */
    public function __construct(
        bool $smtpDebug,
        bool $smtpAuth,
        string $smtpSecure,
        int $port,
        string $host,
        string $username,
        string $password,
        string $fromMail,
        string $fromName
    )
    {
        $this->smtpDebug = $smtpDebug;
        $this->smtpAuth = $smtpAuth;
        $this->smtpSecure = $smtpSecure;
        $this->port = $port;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->fromMail = $fromMail;
        $this->fromName = $fromName;

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

    public function getFromMail(): string
    {
        return $this->fromMail;
    }

    public function getFromName(): string
    {
        return $this->fromName;
    }
}
