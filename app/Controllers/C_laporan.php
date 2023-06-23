<?php

namespace App\Controllers;

use App\Models\M_npd;
use App\Models\M_spj;
use App\Models\M_dpa;
use App\Models\M_laporan;

class C_laporan extends BaseController
{

    public function laporan()
    {
        $data['judul_halaman'] = "Laporan";
        return view('laporan/V_laporan', $data);
    }

    public function laporan_npd()
    {
        $data['judul_halaman'] = "Laporan Nota Pencairan Anggaran";
        $m_laporan = new m_laporan();
        $tahun = $this->request->getPost('tahun');
        $data['tahun'] = $tahun;
        $data['data_npd'] = $m_laporan->lap_npd($tahun);
        return view('laporan/V_laporan_npd', $data);
    }

    public function laporan_spj()
    {
        $data['judul_halaman'] = "Laporan Surat Pertanggung Jawaban";
        $m_laporan = new m_laporan();
        $tahun = $this->request->getPost('tahun');
        $data['tahun'] = $tahun;
        $data['data_spj'] = $m_laporan->lap_spj($tahun);
        return view('laporan/V_laporan_spj', $data);
    }

    public function laporan_dpa()
    {
        $data['judul_halaman'] = "Laporan Dokumen Pelaksana Anggaran";
        $m_laporan = new m_laporan();
        $tahun = $this->request->getPost('tahun');
        $data['tahun'] = $tahun;
        $data['data_dpa'] = $m_laporan->lap_dpa($tahun);
        return view('laporan/V_laporan_dpa', $data);
    }
}
