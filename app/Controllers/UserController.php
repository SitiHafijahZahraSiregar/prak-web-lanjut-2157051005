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
    public function show($id)   
    {
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'profile user',
            'user' => $user,
        ];

        return view('profile',$data);
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
    public function edit($id)   
    {
        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Edit user',
            'user'  => $user,
            'kelas' => $kelas,
        ];

        return view('edit_user',$data);
    }

    public function update($id)
    {
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
    
        // Periksa apakah ada file foto baru yang diunggah
        if ($foto->isValid()) {
            $name = $foto->getRandomName();
            if ($foto->move($path, $name)) {
                $foto = base_url($path . $name);
            }
        } else {
            $existingData = $this->userModel->getUserDataById($id); 
            $foto = $existingData['foto'];
        }
    
        $data = [
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas'),
            'foto'  => $foto
        ];
    
        $result = $this->userModel->updateUser($id, $data);
    
        if (!$result) {
            return redirect()->back()->withInput()->with('error', 'Gagal Menyimpan Data');
        }
    
        return redirect()->to('/user');
    }
    public function destroy($id)
    {
        $result = $this->userModel->deleteUser($id);
        if (!$result) {
            return redirect()->back()->with('Error', 'Gagal menghapus Data');
        }
        return redirect()->to(base_url('/user'))->with('success', 'Berhasil menghapus data');
    }
    public function store()
    {
        if (!$this->validate([
            'foto' => [
                'rules'         => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',

                'errors'        => [
                    'uploaded'  => 'Foto harus dipilih.',
                    'is_image'  => 'Yang anda pilih bukan gambar.',
                    'mime_in'   => 'Foto harus berekstensi png,jpg,jpeg,gif.'
                ]
                ],
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
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'is_unique' => '{field} sudah terdaftar.',
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
        $path = 'assets/uplouds/img/';
            $foto = $this->request->getFile('foto');
            $name = $foto->getRandomName();

            if ($foto->move($path, $name)) {
                $foto = base_url($path . $name);
            }
        
        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas'),
            'email' => $this ->request->getVar('email'),
            'no_hp' => $this ->request->getVar('no_hp'),
            'foto'  => $foto

        ]);
       
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('/user');
    }
}
