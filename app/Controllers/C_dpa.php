<?php

namespace App\Controllers;

use App\Models\M_dpa;
use App\Models\M_npd;

class C_dpa extends BaseController
{
    public function dpa()
    {
        $data['judul_halaman'] = "Data Dokumen Pelaksana Anggaran";
        $m_dpa = new M_dpa();
        $data['data_dpa'] = $m_dpa->getAll()->getresult();
        return view('dpa/V_list_dpa', $data);
    }

    public function add_dpa()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Tambah Data Dokumen Pelaksana Anggaran";
        $data['data_kegiatan'] = $db->table('kegiatan')->get()->getresult();
        return view('dpa/V_add_dpa', $data);
    }

    public function save_dpa()
    {
        $db   = \Config\Database::connect();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'id_kegiatan' => $this->request->getPost('id_kegiatan'),
            'volume' => $this->request->getPost('volume'),
            'satuan' => $this->request->getPost('satuan'),
            'harga_satuan' => $this->request->getPost('harga_satuan')
        ];
        $db->table('dpa')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_dpa/add_dpa'));
    }

    public function edit_dpa($id)
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Edit Data Dokumen Pelaksana Anggaran";
        $m_dpa = new M_dpa();
        $data['data_dpa'] = $m_dpa->getByid($id)->getrow();
        $data['data_kegiatan'] = $db->table('kegiatan')->get()->getresult();
        return view('dpa/V_edit_dpa', $data);
    }

    public function update_dpa()
    {
        $db   = \Config\Database::connect();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'id_kegiatan' => $this->request->getPost('id_kegiatan'),
            'volume' => $this->request->getPost('volume'),
            'satuan' => $this->request->getPost('satuan'),
            'harga_satuan' => $this->request->getPost('harga_satuan')
        ];
        $id = $this->request->getPost('id_dpa');
        $db->table('dpa')->update($data, array('id_dpa' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Diupdate.');
        return redirect()->to(base_url('C_dpa/dpa'));
    }

    public function delete_dpa()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('dpa')->delete(array('id_dpa' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_dpa/dpa'));
    }

    // public function nota_dpa($id)
    // {
    //     $db   = \Config\Database::connect();
    //     $data['judul_halaman'] = "Cetak Nota Pencairan Dana";
    //     $m_dpa = new M_dpa();
    //     $data['data_dpa'] = $m_dpa->getByid($id)->getrow();
    //     return view('dpa/V_nota_dpa', $data);
    // }
}
