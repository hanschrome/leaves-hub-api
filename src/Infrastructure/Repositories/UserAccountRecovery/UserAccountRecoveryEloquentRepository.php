<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories\UserAccountRecovery;

use App\Models\UserAccountRecoveryEloquentModel;
use Src\Domain\User\Properties\UserId\UserId;
use Src\Domain\UserAccountRecovery\IUserAccountRecovery;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryCreatedAt\UserAccountRecoveryCreatedAt;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryDueDate\UserAccountRecoveryDueDate;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\UserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryMethod\UserAccountRecoveryMethod;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoverySecretCode\UserAccountRecoverySecretCode;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryStatus\UserAccountRecoveryStatus;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryUpdatedAt\UserAccountRecoveryUpdatedAt;
use Src\Domain\UserAccountRecovery\Repositories\IUserAccountRecoveryRepository;
use Src\Domain\UserAccountRecovery\Repositories\Exceptions\UserAccountRecoveryException;
use Src\Domain\UserAccountRecovery\UserAccountRecovery;

class UserAccountRecoveryEloquentRepository implements IUserAccountRecoveryRepository
{

    public function getUserAccountRecoveryById(IUserAccountRecoveryId $userAccountRecoveryId): IUserAccountRecovery
    {
        /** @var UserAccountRecoveryEloquentModel $userAccountRecoveryIdEloquent */
        $userAccountRecoveryIdEloquent = UserAccountRecoveryEloquentModel::all(['uuid' => $userAccountRecoveryId->value()])->first();

        return new UserAccountRecovery(
            new UserAccountRecoveryId($userAccountRecoveryIdEloquent->uuid),
            new UserAccountRecoveryMethod($userAccountRecoveryIdEloquent->method),
            new UserId($userAccountRecoveryIdEloquent->user_uuid),
            new UserAccountRecoveryStatus($userAccountRecoveryIdEloquent->status),
            new UserAccountRecoverySecretCode($userAccountRecoveryIdEloquent->secret_code),
            new UserAccountRecoveryDueDate($userAccountRecoveryIdEloquent->due_date),
            new UserAccountRecoveryUpdatedAt($userAccountRecoveryIdEloquent->updated_at),
            new UserAccountRecoveryCreatedAt($userAccountRecoveryIdEloquent->created_at)
        );
    }

    /**
     * @throws UserAccountRecoveryException
     */
    public function createUserAccountRecovery(IUserAccountRecovery $userAccountRecovery): IUserAccountRecovery
    {
        $userAccountRecoveryEloquentModel = new UserAccountRecoveryEloquentModel();

        $userAccountRecoveryEloquentModel->uuid = $userAccountRecovery->getId()->value();
        $userAccountRecoveryEloquentModel->method = $userAccountRecovery->getMethod()->value();
        $userAccountRecoveryEloquentModel->user_uuid = $userAccountRecovery->getUserId()->value();
        $userAccountRecoveryEloquentModel->status = $userAccountRecovery->getStatus()->value();
        $userAccountRecoveryEloquentModel->secret_code = $userAccountRecovery->getSecretCode()->value();
        $userAccountRecoveryEloquentModel->due_date = $userAccountRecovery->getDueDate()->value();
        $userAccountRecoveryEloquentModel->updated_at = $userAccountRecovery->getDueDate()->value();
        $userAccountRecoveryEloquentModel->created_at = $userAccountRecovery->getCreatedAt()->value();

        if (!$userAccountRecoveryEloquentModel->save()) {
            throw new UserAccountRecoveryException('Error saving UserAccountRecovery in database by Eloquent.');
        }

        return $userAccountRecovery;
    }
}
