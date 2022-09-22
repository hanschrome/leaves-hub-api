<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\ResetPassword\Action;

use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Services\ResetPassword\IUserResetPasswordService;
use Src\Infrastructure\Api\Response\IResponse;
use Src\Infrastructure\Api\User\Response\ResetPassword\ResetPasswordUserResponse;
use Src\Infrastructure\Mailing\IMailingService;

class ResetPasswordUserAction
{
    private IUserResetPasswordService $userResetPasswordService;
    private IMailingService $mailingService;
    private IUserRepository $userRepository;

    public function __construct(
        IUserResetPasswordService $userResetPasswordService,
        IMailingService $mailingService,
        IUserRepository $userRepository
    )
    {
        $this->userResetPasswordService = $userResetPasswordService;
        $this->mailingService = $mailingService;
        $this->userRepository = $userRepository;
    }

    public function __invoke(array $requestJsonBody): IResponse
    {
        $email = new UserEmail($requestJsonBody['email']);

        $user = $this->userRepository->findUserByEmail($email);

        $this->userResetPasswordService->resetPasswordByEmail($user->getEmail()); // @todo throw exception if not possible
        $this->mailingService->sendMail($user, '', ''); // @todo add the subject and body

        return new ResetPasswordUserResponse(null, true);
    }
}
