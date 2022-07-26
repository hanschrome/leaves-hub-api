<?php

declare(strict_types=1);

namespace Src\Infrastructure\Mailing;

use Src\Domain\User\Properties\UserEmail\IUserEmail;

class MailingService implements IMailingService
{
    private MailingConfiguration $mailingConfiguration;

    public function __construct(MailingConfiguration $mailingConfiguration)
    {
        $this->mailingConfiguration = $mailingConfiguration;
    }

    public function getMailingConfiguration(): MailingConfiguration
    {
        return $this->mailingConfiguration;
    }

    public function sendMail(IUserEmail $userEmail, string $subject, string $body): bool
    {
        return true;
    }
}
