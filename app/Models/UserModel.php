<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $useTimestamp = true;
    protected $allowedFields = ['name', 'email', 'gender', 'image', 'password', 'role_id', 'is_active', 'created_at', 'updated_at'];
}
