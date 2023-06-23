<?php

namespace App\Controllers;

use App\Models\M_spj;
use App\Models\M_npd;

class C_spj extends BaseController
{
    public function spj()
    {
        $data['judul_halaman'] = "Data Surat Pertanggung Jawaban";
        $m_spj = new M_spj();
        $data['data_spj'] = $m_spj->getAll()->getresult();
        return view('spj/V_list_spj', $data);
    }

    public function add_spj()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Tambah Data Surat Pertanggung Jawaban";
        $m_npd = new M_npd();
        $data['data_npd'] = $m_npd->getAllbyStatus()->getresult();
        return view('spj/V_add_spj', $data);
    }

    public function save_spj()
    {
        $db   = \Config\Database::connect();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'id_npd' => $this->request->getPost('id_npd'),
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_kegiatan' => $this->request->getPost('id_kegiatan'),
            'pptk' => $this->request->getPost('pptk'),
            'disetujui' => $this->request->getPost('disetujui')
        ];
        $db->table('spj')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_spj/add_spj'));
    }

    public function edit_spj($id)
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Edit Data Surat Pertanggung Jawaban";
        $m_spj = new M_spj();
        $m_npd = new M_npd();
        $data['data_spj'] = $m_spj->getByid($id)->getrow();
        $data['data_npd'] = $m_npd->getAll()->getresult();
        return view('spj/V_edit_spj', $data);
    }

    public function update_spj()
    {
        $db   = \Config\Database::connect();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'id_npd' => $this->request->getPost('id_npd'),
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_kegiatan' => $this->request->getPost('id_kegiatan'),
            'pptk' => $this->request->getPost('pptk'),
            'disetujui' => $this->request->getPost('disetujui')
        ];
        $id = $this->request->getPost('id_spj');
        $db->table('spj')->update($data, array('id_spj' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Diupdate.');
        return redirect()->to(base_url('C_spj/spj'));
    }

    public function delete_spj()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('spj')->delete(array('id_spj' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_spj/spj'));
    }

    public function nota_spj($id)
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Cetak Kwitansi";
        $m_spj = new M_spj();
        $data['data_spj'] = $m_spj->getByid($id)->getrow();
        return view('spj/V_nota_spj', $data);
    }
}
