<?php

namespace App\Controllers;

use App\Models\M_pegawai;
use App\Models\M_user;


class C_admin extends BaseController
{

    public function index()
    {
        $data['judul_halaman'] = "Home";
        return view('V_home', $data);
    }

    public function bidang()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Data Bidang";
        $data['data_bidang'] = $db->table('bidang')->get()->getresult();
        return view('V_bidang', $data);
    }

    public function save_bidang()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_bidang' => $this->request->getPost('nama')
        ];
        $db->table('bidang')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_admin/bidang'));
    }

    public function edit_bidang()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_bidang' => $this->request->getPost('nama')
        ];
        $id = $this->request->getPost('id');
        $db->table('bidang')->update($data, array('id_bidang' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_admin/bidang'));
    }

    public function delete_bidang()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('bidang')->delete(array('id_bidang' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_admin/bidang'));
    }
    // end crud bidang

    public function jabatan()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Data Jabatan";
        $data['data_jabatan'] = $db->table('jabatan')->get()->getresult();
        return view('V_jabatan', $data);
    }

    public function save_jabatan()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_jabatan' => $this->request->getPost('nama')
        ];
        $db->table('jabatan')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_admin/jabatan'));
    }

    public function edit_jabatan()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_jabatan' => $this->request->getPost('nama')
        ];
        $id = $this->request->getPost('id');
        $db->table('jabatan')->update($data, array('id_jabatan' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_admin/jabatan'));
    }

    public function delete_jabatan()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('jabatan')->delete(array('id_jabatan' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_admin/jabatan'));
    }

    // edn crud jabatan

    public function pegawai()
    {
        $db   = \Config\Database::connect();
        $m_pegawai = new M_pegawai();
        $data['judul_halaman'] = "Data pegawai";
        $data['data_pegawai'] = $m_pegawai->getAll()->getResult();
        $data['data_bidang'] = $db->table('bidang')->get()->getresult();
        $data['data_jabatan'] = $db->table('jabatan')->get()->getresult();
        return view('V_pegawai', $data);
    }

    public function save_pegawai()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama_pegawai' => $this->request->getPost('nama'),
            'id_bidang' => $this->request->getPost('bidang'),
            'id_jabatan' => $this->request->getPost('jabatan'),
            'no_rekening' => $this->request->getPost('norek')
        ];
        $db->table('pegawai')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_admin/pegawai'));
    }

    public function edit_pegawai()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama_pegawai' => $this->request->getPost('nama'),
            'id_bidang' => $this->request->getPost('bidang'),
            'id_jabatan' => $this->request->getPost('jabatan'),
            'no_rekening' => $this->request->getPost('norek')
        ];
        $id = $this->request->getPost('id');
        $db->table('pegawai')->update($data, array('id_pegawai' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_admin/pegawai'));
    }

    public function delete_pegawai()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('pegawai')->delete(array('id_pegawai' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_admin/pegawai'));
    }

    // end crud pegawai

    public function kegiatan()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = "Data kegiatan";
        $data['data_kegiatan'] = $db->table('kegiatan')->get()->getresult();
        return view('V_kegiatan', $data);
    }

    public function save_kegiatan()
    {
        $db   = \Config\Database::connect();
        $data = [
            'kode_rekening' => $this->request->getPost('korek'),
            'nama_kegiatan' => $this->request->getPost('nama')
        ];
        $db->table('kegiatan')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_admin/kegiatan'));
    }

    public function edit_kegiatan()
    {
        $db   = \Config\Database::connect();
        $data = [
            'kode_rekening' => $this->request->getPost('korek'),
            'nama_kegiatan' => $this->request->getPost('nama')
        ];
        $id = $this->request->getPost('id');
        $db->table('kegiatan')->update($data, array('id_kegiatan' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_admin/kegiatan'));
    }

    public function delete_kegiatan()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('kegiatan')->delete(array('id_kegiatan' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_admin/kegiatan'));
    }


    public function user()
    {
        $model = new M_user();
        $data['judul_halaman'] = "Data User";
        $data['data_user'] = $model->getAll()->getResult();
        $data['data_level'] = $model->getLevel()->getResult();
        return view('V_user', $data);
    }
    public function save_user()
    {
        $model = new M_user();
        $data = array(
            'namauser' => $this->request->getpost('nama_user'),
            'username' => $this->request->getpost('username'),
            'password' => password_hash($this->request->getpost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getpost('level')
        );

        $model->saveuser($data);
        session()->setflashdata('sukses', 'Data Berhasil Di Simpan.');
        return redirect()->to(base_url('C_admin/user'));
    }

    public function edit_user()
    {
        $model = new M_user();
        $id = $this->request->getPost("id_user");
        if ($this->request->getVar('password') == "") {
            $pw = $this->request->getVar('old_password');
        } else {
            $pw = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }
        $data = array(
            'namauser' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => $pw,
            'level' => $this->request->getPost('level')
        );

        $model->edituser($data, $id);
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_admin/user'));
    }
    public function delete_user()
    {
        $model = new M_user();
        $id = $this->request->getPost("id");
        $model->deleteUser($id);
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_admin/user'));
    }
}
