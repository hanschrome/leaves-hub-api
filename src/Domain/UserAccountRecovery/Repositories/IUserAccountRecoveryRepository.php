<?php

declare(strict_types=1);

namespace Src\Domain\UserAccountRecovery\Repositories;

use Src\Domain\UserAccountRecovery\IUserAccountRecovery;
use Src\Domain\UserAccountRecovery\Properties\UserAccountRecoveryId\IUserAccountRecoveryId;

interface IUserAccountRecoveryRepository
{
    public function getUserAccountRecoveryById(IUserAccountRecoveryId $userAccountRecoveryId): IUserAccountRecovery;

    public function createUserAccountRecovery(IUserAccountRecovery $userAccountRecovery): IUserAccountRecovery;
}
