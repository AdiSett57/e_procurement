<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class UsersModel extends MythModel
{

    protected $returnType = 'App\Entities\UserEntity';
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id', 'email', 'username', 'phone', 'vendor', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'fullname', 'user_image'
    ];
}
