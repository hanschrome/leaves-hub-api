<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\Registration\Service;

use Src\App\UseCase\User\Registration\Exception\RegisterUserActionNotVerifiedUserIntentException;
use Src\App\UseCase\User\Registration\Exception\RegisterUserActionVerifiedUserIntentException;
use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\IUser;
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

    /**
     * @throws RegisterUserActionVerifiedUserIntentException
     * @throws RegisterUserActionNotVerifiedUserIntentException
     */
    public function registerUserByEmail(IUserEmail $userEmail): void
    {
        $user = $this->userRepository->findUserByEmail($userEmail);

        if ($user !== null) {
            if ($user->getVerifiedAt() !== null) {
                throw new RegisterUserActionVerifiedUserIntentException();
            } else {
                throw new RegisterUserActionNotVerifiedUserIntentException();
            }
        }

        $unsignedUser = $this->userRepository->createUnsignedUserByEmail($userEmail);

        $this->sendUserEmail($unsignedUser);
    }

    private function sendUserEmail(IUser $user): void
    {
        if (!$this->mailingService->sendMail(
            $user,
            'Confirm your email address',
            str_replace(
                ['{{FRONT_HOST}}', $user->getVerifyToken()],
                ['', $user->getVerifyToken()],
                'Click on the following link: {{FRONT_HOST}}/confirm-email/{{HASH}}')
        )
        ) {
            // don't to throw exception, this is not an actual error. We should try to send it several times in a queue
            // and when the max_tries is reached, set as job failed. --> I think rabbitmq will help a lot of here ))
        }
    }
}
