<?php

namespace App\Controllers;

use App\Models\M_npd;
use App\Models\M_spj;

class C_bendahara extends BaseController
{
    public function npd()
    {

        $data['judul_halaman'] = "Data Nota Pencairan Dana";
        $m_npd = new M_npd();
        $data['data_npd'] = $m_npd->getAll()->getresult();
        return view('bendahara/V_list_npd', $data);
    }

    public function detail_npd($id)
    {

        $data['judul_halaman'] = "Detail Nota Pencairan Dana";
        $m_npd = new M_npd();
        $data['data_npd'] = $m_npd->getByid($id)->getrow();
        return view('bendahara/V_detail_npd', $data);
    }

    public function cairkan_npd($id_npd)
    {
        $db   = \Config\Database::connect();
        $data = [
            'status' => 4
        ];
        $db->table('npd')->update($data, array('id_npd' => $id_npd));
        session()->setflashdata('sukses', 'Data NPD Berhasil Di Setujui.');
        return redirect()->to(base_url('C_bendahara/npd'));
    }

    // public function tolak_npd($id_npd)
    // {
    //     $db   = \Config\Database::connect();
    //     $data = [
    //         'status' => 3
    //     ];
    //     $db->table('npd')->update($data, array('id_npd' => $id_npd));
    //     session()->setflashdata('error', 'Data NPD Ditolak.');
    //     return redirect()->to(base_url('C_bendahara/npd'));
    // }


    public function spj()
    {
        $data['judul_halaman'] = "Data Surat Pertanggung Jawaban";
        $m_spj = new M_spj();
        $data['data_spj'] = $m_spj->getAll()->getresult();
        return view('bendahara/V_list_spj', $data);
    }

    public function nota_spj($id)
    {
        $data['judul_halaman'] = "Cetak Kwitansi";
        $m_spj = new M_spj();
        $data['data_spj'] = $m_spj->getByid($id)->getrow();
        return view('bendahara/V_nota_spj', $data);
    }
}
