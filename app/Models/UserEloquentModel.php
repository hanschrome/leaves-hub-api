<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $uuid
 * @property string $email
 * @property int $status
 * @property ?int $email_verified_at
 * @property ?string $password
 * @property ?string verify_token
 * @property int|Carbon $updated_at;
 * @property int|Carbon $created_at;
 */
class UserEloquentModel extends Model
{
    protected $table = 'users';
}
