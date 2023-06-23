<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pegawai extends Model
{
    public function getAll()
    {
        $builder = $this->db->table('pegawai');
        $builder->select('*');
        $builder->join('bidang', 'pegawai.id_bidang=bidang.id_bidang', 'left');
        $builder->join('jabatan', 'pegawai.id_jabatan=jabatan.id_jabatan', 'left');
        return $builder->get();
    }
}
