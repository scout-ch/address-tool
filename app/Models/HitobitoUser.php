<?php

namespace App\Models;

use Carbon\Carbon;
use Parental\HasParent;

/**
 * @property int $id
 * @property string $name
 * @property string $group
 * @property string $password
 * @property string $email
 * @property string $image_url
 * @property string $login_provider
 * @property int $hitobito_id
 */
class HitobitoUser extends User
{
    use HasParent;

    public function __construct(...$args)
    {
        $this->fillable[] = 'hitobito_id';
        parent::__construct(...$args);
    }

    public function newInstance($attributes = [], $exists = false)
    {
        return tap(parent::newInstance($attributes, $exists), function ($instance) {
            $instance->email_verified_at = Carbon::now();
        });
    }
}
