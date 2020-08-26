<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamp = true;
    protected $allowedFields = ['name', 'email', 'gender', 'image', 'password', 'is_active', 'date_created'];
}
