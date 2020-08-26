<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $useTimestamp = true;
    protected $allowedFields = 'name';
}
