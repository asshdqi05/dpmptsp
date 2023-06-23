<?php

namespace App\Models;

use CodeIgniter\Model;

class M_dpa extends Model
{
    public function getAll()
    {
        $builder = $this->db->table('dpa');
        $builder->select('*,dpa.tanggal as tgl_dpa');
        $builder->join('kegiatan', 'kegiatan.id_kegiatan=dpa.id_kegiatan', 'left');
        return $builder->get();
    }

    public function getByid($id)
    {
        $builder = $this->db->table('dpa');
        $builder->select('*,dpa.tanggal as tgl_dpa');
        $builder->join('kegiatan', 'kegiatan.id_kegiatan=dpa.id_kegiatan', 'left');
        $builder->where('id_dpa', $id);
        return $builder->get();
    }
}
