<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Registration\Action;

use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Services\Registration\IUserRegistrationService;
use Src\Infrastructure\Mailing\IMailingService;

class SendRegisterEmailUserInternalAction
{
    public const PARAM_EMAIL = 'email';
    private IUserRegistrationService $iUserRegistrationService;
    private IMailingService $mailingService;

    public function __construct(
        IUserRegistrationService $iUserRegistrationService,
        IMailingService $mailingService
    )
    {
        $this->iUserRegistrationService = $iUserRegistrationService;
        $this->mailingService = $mailingService;
    }

    public function __invoke(IUserEmail $userEmail): void
    {

    }
}
