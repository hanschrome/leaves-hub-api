<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories\UserSession;

use App\Models\UserSessionEloquentModel;
use Src\Domain\UserSession\IUserSession;
use Src\Domain\UserSession\Repositories\IUserSessionRepository;
use Src\Infrastructure\Repositories\UserSession\Exceptions\UserSessionNotSavedException;

class UserSessionEloquentRepository implements IUserSessionRepository
{

    /**
     * @throws UserSessionNotSavedException
     */
    public function create(IUserSession $userSession): IUserSession
    {
        $userSessionEloquentModel = new UserSessionEloquentModel();

        $userSessionEloquentModel->uuid = $userSession->getId()->value();
        $userSessionEloquentModel->user_uuid = $userSession->getUserId()->value();
        $userSessionEloquentModel->expiration_date = $userSession->getExpirationDate()->value();
        $userSessionEloquentModel->updated_at = $userSession->getUpdatedAt()->value();
        $userSessionEloquentModel->created_at = $userSession->getCreatedAt()->value();

        if (!$userSessionEloquentModel->save()) { // @todo log in Sentry
            throw new UserSessionNotSavedException('Error in save');
        }

        return $userSession;
    }
}
