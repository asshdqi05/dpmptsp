<?php

namespace App\Models;

use CodeIgniter\Model;

class M_laporan extends Model
{
    public function lap_npd($tahun)
    {
        // $builder = $this->db->table('npd');
        // $builder->select('*');
        // $builder->join('kegiatan', 'kegiatan.id_kegiatan=npd.id_kegiatan', 'left');
        // $builder->join('pegawai', 'pegawai.id_pegawai=npd.id_penerima', 'left');
        // $builder->where('DATE_FORMAT(tanggal,"%Y")', '2021', false);
        // return $builder->get();

        $sql = $this->db->query("SELECT * FROM npd 
        LEFT JOIN kegiatan ON kegiatan.`id_kegiatan` = npd.`id_kegiatan`
        LEFT JOIN pegawai ON pegawai.`id_pegawai`= npd.`id_penerima`
        WHERE status=4 AND DATE_FORMAT(tanggal,'%Y')= '$tahun'");

        return $sql->getResult();
    }

    public function lap_spj($tahun)
    {
        // $builder = $this->db->table('spj');
        // $builder->select('*');
        // $builder->join('npd', 'npd.id_npd=spj.id_npd', 'left');
        // $builder->join('pegawai', 'pegawai.id_pegawai=spj.id_pegawai', 'left');
        // $builder->join('kegiatan', 'kegiatan.id_kegiatan=spj.id_kegiatan', 'left');
        // $builder->where('DATE_FORMAT(tanggal,"%Y")', $tahun, false);
        // return $builder->get();

        $sql = $this->db->query("SELECT * FROM spj 
        LEFT JOIN npd ON npd.`id_npd` = spj.`id_npd`
        LEFT JOIN pegawai ON pegawai.`id_pegawai`= spj.`id_pegawai`
        LEFT JOIN kegiatan ON kegiatan.`id_kegiatan`= spj.`id_kegiatan`
        WHERE DATE_FORMAT(spj.tanggal,'%Y')= '$tahun'");

        return $sql->getResult();
    }

    public function lap_dpa($tahun)
    {
        // $builder = $this->db->table('dpa');
        // $builder->select('*,dpa.tanggal as tgl_dpa');
        // $builder->join('npd', 'npd.id_npd=dpa.id_npd', 'left');
        // $builder->join('kegiatan', 'kegiatan.id_kegiatan=dpa.id_kegiatan', 'left');
        // $builder->where('DATE_FORMAT(dpa.tanggal,"%Y")', $tahun);
        // return $builder->get();

        $sql = $this->db->query("SELECT * FROM dpa 
        LEFT JOIN kegiatan ON kegiatan.`id_kegiatan`= dpa.`id_kegiatan`
        WHERE DATE_FORMAT(tanggal,'%Y')= '$tahun'");

        return $sql->getResult();
    }
}
