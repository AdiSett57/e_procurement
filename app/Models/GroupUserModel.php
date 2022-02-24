<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class GroupUserModel extends MythModel
{

    protected $table = 'auth_groups_users';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'group_id', 'user_id'
    ];
}
