<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string uuid
 * @property string user_uuid
 * @property int status
 * @property int expiration_date
 * @property int updated_at
 * @property int created_at
 */
class UserSessionEloquentModel extends Model
{
    protected $table = 'user_session';
}
