<?php

namespace App\Controllers;

class FormLoop extends BaseController
{
    public function index()
    {
        $data['title'] = "Insert Form Looping Using Javascript";
        $this->load->view('form/form_loop', $data);
    }

    public function post()
    {
        $input = new \App\Models\InquiryModel();
        $tanggal = date('d-m-Y');
        $user = user()->username;
        $i = 0;
        $nama_barang = $this->request->getPost('nama_barang');
        
        if ($nama_barang[0] !== null) {
            foreach ($nama_barang as $nm) {
                $data = [
                    'id_customer' => $this->request->getPost('id_customer'),
                    'no_spph_masuk' => $this->request->getPost('no_spph_masuk'),
                    'tanggal' => $tanggal,
                    'nama_barang' => $nm,
                    'volume' => $this->request->getPost('volume')[$i],
                    'satuan' => $this->request->getPost('satuan')[$i],
                    'inputed_by' => $user,
                    'status' => 'requested',
                    'kode_urut'=> date('m')
                ];

                $input->save($data);
                if ($input) {
                    $i++;
                }   
            }
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>';
            return redirect()->to('admin/dashboard');
        } else {
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Gagal Menambah Data</div>';
            echo view('user/inputData');
        }
    }
}
