<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $useTimestamp = true;
    protected $allowedFields = ['name', 'address', 'birth_place', 'birth_date', 'religion', 'phone', 'gender', 'image', 'created_at', 'updated_at'];

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table ORDER BY id DESC";
        return $this->db->query($sql)->getResultArray();
    }
}
