<?php

namespace App\Controllers;

use App\Models\M_npd;
use App\Models\M_spj;

class C_kasubag extends BaseController
{


    public function npd()
    {

        $data['judul_halaman'] = "Data Nota Pencairan Dana";
        $m_npd = new M_npd();
        $data['data_npd'] = $m_npd->getAll()->getresult();
        return view('kasubag/V_list_npd', $data);
    }

    public function detail_npd($id)
    {

        $data['judul_halaman'] = "Detail Nota Pencairan Dana";
        $m_npd = new M_npd();
        $data['data_npd'] = $m_npd->getByid($id)->getrow();
        return view('kasubag/V_detail_npd', $data);
    }

    public function setuju_npd($id_npd)
    {
        $db   = \Config\Database::connect();
        $data = [
            'status' => 2
        ];
        $db->table('npd')->update($data, array('id_npd' => $id_npd));
        session()->setflashdata('sukses', 'Data NPD Berhasil Di Setujui.');
        return redirect()->to(base_url('C_kasubag/npd'));
    }

    public function tolak_npd($id_npd)
    {
        $db   = \Config\Database::connect();
        $data = [
            'status' => 3
        ];
        $db->table('npd')->update($data, array('id_npd' => $id_npd));
        session()->setflashdata('error', 'Data NPD Ditolak.');
        return redirect()->to(base_url('C_kasubag/npd'));
    }
}
