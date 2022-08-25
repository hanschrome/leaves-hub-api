<?php

declare(strict_types=1);

namespace Src\Infrastructure\Mailing;

use Src\Domain\User\IUser;

interface IMailingService
{
    public function __construct(MailingConfiguration $mailingConfiguration);

    public function sendMail(IUser $user, string $subject, string $body): bool;
}
