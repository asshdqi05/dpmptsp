<?php

namespace App\Models;

use CodeIgniter\Model;

class M_npd extends Model
{
    public function getAll()
    {
        $builder = $this->db->table('npd');
        $builder->select('*');
        $builder->join('kegiatan', 'kegiatan.id_kegiatan=npd.id_kegiatan', 'left');
        $builder->join('pegawai', 'pegawai.id_pegawai=npd.id_penerima', 'left');
        return $builder->get();
    }

    public function getAllbyStatus()
    {
        $builder = $this->db->table('npd');
        $builder->select('*');
        $builder->join('kegiatan', 'kegiatan.id_kegiatan=npd.id_kegiatan', 'left');
        $builder->join('pegawai', 'pegawai.id_pegawai=npd.id_penerima', 'left');
        $builder->where('status', 4);
        return $builder->get();
    }

    public function getByid($id)
    {
        $builder = $this->db->table('npd');
        $builder->select('*');
        $builder->join('kegiatan', 'kegiatan.id_kegiatan=npd.id_kegiatan', 'left');
        $builder->join('pegawai', 'pegawai.id_pegawai=npd.id_penerima', 'left');
        $builder->where('id_npd', $id);
        return $builder->get();
    }
}
