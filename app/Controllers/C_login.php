<?php

namespace App\Controllers;

use App\Models\M_login;

class C_login extends BaseController
{
    public function index()
    {
        return view('V_login');
    }

    public function login()
    {
        $session = session();
        $model = new M_login();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'iduser'       => $data['iduser'],
                    'namauser'     => $data['namauser'],
                    'username'    => $data['username'],
                    'password'    => $data['password'],
                    'level'    => $data['level'],
                    'logged_in'     => TRUE

                ];
                $session->set($ses_data);
                return redirect()->to(base_url('/C_admin/index'));
            } else {
                $session->setFlashdata('msg', 'Password Anda Salah!');
                return redirect()->to(base_url('/C_login'));
            }
        } else {
            $session->setFlashdata('msg', 'Username Tidak Terdaftar!');
            return redirect()->to(base_url('/C_login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/C_login'));
    }
}
