<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Repositories;

use Src\Domain\UserAccountRecovery\IUserAccountRecovery;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;
use Src\Domain\UserAccountRecovery\Repositories\Exceptions\UserAccountRecoveryException;

interface IUserAccountRecoveryRepository
{
    public function getUserAccountRecoveryById(IUserAccountRecoveryId $userAccountRecoveryId): IUserAccountRecovery;

    /**
     * @throws UserAccountRecoveryException
     */
    public function createUserAccountRecovery(IUserAccountRecovery $userAccountRecovery): IUserAccountRecovery;
}
