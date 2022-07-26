<?php

declare(strict_types=1);

namespace Src\Infrastructure\Mailing;

use Src\Domain\User\Properties\UserEmail\IUserEmail;

interface IMailingService
{
    public function __construct(MailingConfiguration $mailingConfiguration);

    public function sendMail(IUserEmail $userEmail, string $subject, string $body): bool;
}
