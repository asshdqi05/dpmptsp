<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['iduser', 'namauser', 'username', 'password', 'level'];

    public function getAll()
    {
        $builder = $this->db->table('user');
        $builder->select('*');
        $builder->join('leveluser', 'leveluser.id=user.level', 'left');
        return $builder->get();
    }

    public function saveUser($data)
    {
        $query = $this->db->table('user')->insert($data);
        return $query;
    }

    public function editUser($data, $id)
    {
        $query = $this->db->table('user')->update($data, array('iduser' => $id));
        return $query;
    }
    public function deleteUser($id)
    {
        $query = $this->db->table('user')->delete(array('iduser' => $id));
        return $query;
    }
    public function getLevel()
    {
        $bulder = $this->db->table('leveluser');
        return $bulder->get();
    }
}
