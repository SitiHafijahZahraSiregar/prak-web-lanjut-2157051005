<?php

namespace App\Controllers;
use App\Models\KelasModel;
use App\Controllers\BaseController;

class KelasController extends BaseController
{
    public $kelasModel;
    public function __construct() 
    {
        $this->kelasModel = new KelasModel ();
    }
    public function index()
    {
    $data = [
            'title' => 'List Kelas',
            'kelas' => $this->kelasModel->getKelas(),
        ];

        return view('list_kelas',$data);
    }
    public function show($id)   
    {

    }
    
    public function create()
    {
        $data = [
            'title' => "Form Tambah Kelas"
        ];
        return view('create_kelas', $data);
    }
    public function edit($id)   
    {
 
    }

    public function update($id)
    {

    }
    public function destroy($id)
    {

    }
    public function store()
    {
        if (!$this->validate([
            'nama_kelas' => [
                'rules' => 'required|is_unique[kelas.nama_kelas]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'is_unique' => '{field} sudah terdaftar.',
                ]
                ],
        ])) {
            $validationErrors = $this->validator->getErrors();

            // Simpan pesan kesalahan dalam flashdata berdasarkan nama bidang
            foreach ($validationErrors as $field => $error) {
                session()->setFlashdata('error_' . $field, $error);
            }
            return redirect()->to('/kelas/create')->withInput();

            
        }
        
        $this->kelasModel->saveKelas([
            'nama_kelas' => $this->request->getVar('nama_kelas'),

        ]);
       
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('/kelas');
    }
}
