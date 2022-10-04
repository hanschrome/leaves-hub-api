<?php

declare(strict_types=1);

namespace Src\App\UseCase\User\ResetPassword\Service;

use Ramsey\Uuid\Uuid;
use Src\Domain\Repositories\IUserRepository;
use Src\Domain\User\Properties\UserEmail\UserEmail;
use Src\Domain\User\Properties\UserStatus\UserStatus;
use Src\Domain\User\Services\ResetPassword\IUserResetPasswordService;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryCreatedAt\UserAccountRecoveryCreatedAt;
use Src\Domain\UserACcountRecovery\Properties\UserAccountRecoveryDueDate\UserAccountRecoveryDueDate;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\UserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\UserAccountRecoveryMethod;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoverySecretCode\UserAccountRecoverySecretCode;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus\UserAccountRecoveryStatus;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryUpdatedAt\UserAccountRecoveryUpdatedAt;
use Src\Domain\UserAccountRecovery\Repositories\IUserAccountRecoveryRepository;
use Src\Domain\UserAccountRecovery\UserAccountRecovery;

class UserResetPasswordService implements IUserResetPasswordService
{
    private IUserRepository $userRepository;
    private IUserAccountRecoveryRepository $userAccountRecoveryRepository;

    public function __construct(
        IUserRepository $userRepository,
        IUserAccountRecoveryRepository $userAccountRecoveryRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->userAccountRecoveryRepository = $userAccountRecoveryRepository;
    }

    public function resetPasswordByEmail(UserEmail $userEmail): bool
    {
        $user = $this->userRepository->findUserByEmail($userEmail);
        $out = false;

        if ($user->getStatus() == UserStatus::ACTIVE) {
            $userAccountRecovery = new UserAccountRecovery(
                new UserAccountRecoveryId(Uuid::uuid4()->toString()),
                new UserAccountRecoveryMethod(UserAccountRecoveryMethod::METHOD_EMAIL_CODE),
                $user->getId(),
                new UserAccountRecoveryStatus(UserAccountRecoveryStatus::STATUS_VALID),
                new UserAccountRecoverySecretCode(Uuid::uuid4()->toString()),
                new UserAccountRecoveryDueDate(now()->timestamp + 24*3600), // @todo fix this
                new UserAccountRecoveryUpdatedAt(now()->timestamp),
                new UserAccountRecoveryCreatedAt(now()->timestamp)
            );

            $this->userAccountRecoveryRepository->createUserAccountRecovery($userAccountRecovery);
            $out = true;
        }

        return $out;
    }
}
