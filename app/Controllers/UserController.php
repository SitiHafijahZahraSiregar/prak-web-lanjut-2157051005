<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;
    public function __construct() 
    {
        $this->userModel = new UserModel ();
        $this->kelasModel = new KelasModel ();
    }
    public function index()
    {
        $data = [
            'title' => 'List User',
            'user' => $this->userModel->getUser(),
        ];
        
        return view('list_user',$data);
    }
    public function profile($nama = "",$kelas = "",$npm ="")
    {
        $data = [
            'nama' => $nama,
            'npm' => $npm,
            'kelas' => $kelas,
        ];
        return view('profile', $data);
    }
    public function create()
    {
        
        $kelas = $this->kelasModel->getkelas();
        $data = [
            'kelas' => $kelas,
            'title' => "Form Tambah User"
        ];
        return view('create_user', $data);
    }
    public function store()
    {
        if (!$this->validate([
            'npm' => [
                'rules' => 'required|is_unique[user.npm]|min_length[10]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'is_unique' => '{field} sudah terdaftar.',
                    'min_length' => '{field} minamal 10 karakter.',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
                ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'valid_email' => 'masukkan alamat {field} yang valid.',
                ]
                ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
                ],
        ])) {
            $validationErrors = $this->validator->getErrors();

            // Simpan pesan kesalahan dalam flashdata berdasarkan nama bidang
            foreach ($validationErrors as $field => $error) {
                session()->setFlashdata('error_' . $field, $error);
            }
            return redirect()->to('/user/create')->withInput();
        }
        
        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas'),
            'email' => $this ->request->getVar('email'),
            'no_hp' => $this ->request->getVar('no_hp')

        ]);
       
        return view('list_user');
    }
}
