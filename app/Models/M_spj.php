<?php

namespace App\Models;

use CodeIgniter\Model;

class M_spj extends Model
{
    public function getAll()
    {
        $builder = $this->db->table('spj');
        $builder->select('*');
        $builder->join('npd', 'npd.id_npd=spj.id_npd', 'left');
        $builder->join('pegawai', 'pegawai.id_pegawai=spj.id_pegawai', 'left');
        $builder->join('kegiatan', 'kegiatan.id_kegiatan=spj.id_kegiatan', 'left');
        return $builder->get();
    }

    public function getByid($id)
    {
        $builder = $this->db->table('spj');
        $builder->select('*');
        $builder->join('npd', 'npd.id_npd=spj.id_npd', 'left');
        $builder->join('pegawai', 'pegawai.id_pegawai=spj.id_pegawai', 'left');
        $builder->join('kegiatan', 'kegiatan.id_kegiatan=spj.id_kegiatan', 'left');
        $builder->where('id_spj', $id);
        return $builder->get();
    }
}
