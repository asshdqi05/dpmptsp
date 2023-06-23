<?php

namespace App\Controllers;

use App\Models\M_npd;

class C_npd extends BaseController
{
    public function npd()
    {

        $data['judul_halaman'] = "Data Nota Pencairan Dana";
        $m_npd = new M_npd();
        $data['data_npd'] = $m_npd->getAll()->getresult();
        return view('npd/V_list_npd', $data);
    }

    public function add_npd()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Tambah Data Nota Pencairan Dana";
        $data['data_kegiatan'] = $db->table('kegiatan')->get()->getresult();
        $data['data_pegawai'] = $db->table('pegawai')->get()->getresult();
        return view('npd/V_add_npd', $data);
    }

    public function save_npd()
    {
        $db   = \Config\Database::connect();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'id_kegiatan' => $this->request->getPost('id_kegiatan'),
            'norek_asal' => $this->request->getPost('norek_asal'),
            'norek_tujuan' => $this->request->getPost('norek_tujuan'),
            'id_penerima' => $this->request->getPost('id_pegawai'),
            'nominal' => $this->request->getPost('nominal'),
            'status' => 1
        ];
        $db->table('npd')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_npd/add_npd'));
    }

    public function edit_npd($id)
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Edit Data Nota Pencairan Dana";
        $m_npd = new M_npd();
        $data['data_npd'] = $m_npd->getByid($id)->getrow();
        $data['data_kegiatan'] = $db->table('kegiatan')->get()->getresult();
        $data['data_pegawai'] = $db->table('pegawai')->get()->getresult();
        return view('npd/V_edit_npd', $data);
    }

    public function update_npd()
    {
        $db   = \Config\Database::connect();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'id_kegiatan' => $this->request->getPost('id_kegiatan'),
            'norek_asal' => $this->request->getPost('norek_asal'),
            'norek_tujuan' => $this->request->getPost('norek_tujuan'),
            'id_penerima' => $this->request->getPost('id_pegawai'),
            'nominal' => $this->request->getPost('nominal'),
            'status' => 1
        ];
        $id = $this->request->getPost('id_npd');
        $db->table('npd')->update($data, array('id_npd' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Diupdate.');
        return redirect()->to(base_url('C_npd/npd'));
    }

    public function delete_npd()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('npd')->delete(array('id_npd' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_npd/npd'));
    }

    public function nota_npd($id)
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Cetak Nota Pencairan Dana";
        $m_npd = new M_npd();
        $data['data_npd'] = $m_npd->getByid($id)->getrow();
        return view('npd/V_nota_npd', $data);
    }
}
