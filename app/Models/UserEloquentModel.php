<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $uuid
 * @property string $email
 * @property int $email_verified_at
 * @property string $password
 * @property int $updated_at;
 * @property int $created_at;
 */
class UserEloquentModel extends Model
{
    protected $table = 'users';
}
