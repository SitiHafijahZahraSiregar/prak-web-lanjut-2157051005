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
        $kelas = $this->kelasModel->getKelasid($id);

        $data = [
            'title' => 'Edit kelas',
            'kelas' => $kelas,
        ];

        return view('edit_kelas',$data);
    }

    public function update($id)
    {
        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas'),
        ];
    
        $result = $this->kelasModel->updateKelas($id, $data);
    
        if (!$result) {
            return redirect()->back()->withInput()->with('error', 'Gagal Menyimpan Data');
        }
    
        return redirect()->to('/kelas');
    }
    public function destroy($id)
    {
        $result = $this->kelasModel->deleteKelas($id);
        if (!$result) {
            return redirect()->back()->with('Error', 'Gagal menghapus Data');
        }
        return redirect()->to(base_url('/kelas'))->with('success', 'Berhasil menghapus data');
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
