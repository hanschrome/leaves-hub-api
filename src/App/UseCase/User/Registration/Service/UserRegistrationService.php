<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Registration\Service;

use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\Properties\UserEmail\IUserEmail;
use Src\Domain\User\Services\IUserRegistrationService;
use Src\Infrastructure\Mailing\IMailingService;

class UserRegistrationService implements IUserRegistrationService
{
    private IUserRepository $userRepository;
    private IMailingService $mailingService;

    public function __construct(
        IUserRepository $userRepository,
        IMailingService $mailingService
    )
    {
        $this->userRepository = $userRepository;
        $this->mailingService = $mailingService;
    }

    public function registerUserByEmail(IUserEmail $userEmail): bool
    {
        $user = $this->userRepository->findUserByEmail($userEmail);

        if ($user !== null) {
            /**
             * @todo
             * - Check if it's validated
             * - In case of not, offer to resend a confirmation email
             */
            return false;
        }

        $unsignedUser = $this->userRepository->createUnsignedUserByEmail($userEmail);

        $this->sendUserEmail($unsignedUser->getEmail());

        return true;
    }

    private function sendUserEmail(IUserEmail $userEmail): void
    {
        if (!$this->mailingService->sendMail($userEmail, '', '')) {
            // don't to throw exception, this is not an actual error. We should try to send it several times in a queue
            // and when the max_tries is reached, set as job failed. --> I think rabbitmq will help a lot of here ))
        }
    }
}
