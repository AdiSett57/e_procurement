<?php

namespace App\Models;

use CodeIgniter\Model;


class LogModel extends Model
{
    protected $table = 'log';
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
       'id_log', 'nama_user', 'last_login', 'ip', 'perangkat'
    ];

}
