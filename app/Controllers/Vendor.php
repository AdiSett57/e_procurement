<?php

namespace App\Controllers;

use \App\Models\inquiryModel;
use \App\Models\FeedbackVendorModel;
use \App\Models\VendorModel;

class Vendor extends BaseController
{
    protected $db, $builder, $inquiryProses, $pager, $vendor, $feedback_vendor;

    public function __construct()
    {
        $this->feedback_vendor = new FeedbackVendorModel();
        $this->vendor = new VendorModel();
        $this->pager = \Config\Services::pager();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->inquiryProses = new inquiryModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Vendor Dashboard'
        ];

        return view('admin/index', $data);
    }

    public function incoming_request()
    {
        $data_vendor = user()->vendor;
        $hasil = $this->vendor->getValVendor($data_vendor);
        $confirm_vendor = $hasil['id'];

        $currentPage = $this->request->getVar('page_penawaran') ? $this->request->getVar('page_penawaran') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $isi = $this->inquiryProses->search($keyword);
        } else {
            $isi = $this->inquiryProses->getInquiryVendor()->notLike('confirm_vendor', $confirm_vendor);
        }
        $data = [
            "judul" => "Incoming Request",
            'inquiryProses' => $isi->paginate(6, 'penawaran'),
            'pager' => $isi->pager,
            'currentPage' => $currentPage
        ];
        return view('vendor/incoming_request', $data);
    }

    public function incomingSend($id)
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'harga_satuan' => 'required',
            'durasi_pengiriman' => 'required'
        ])){

            $vendor = user()->vendor;
            $data_vendor = $this->vendor->getValVendor($vendor);
            $data_penawaran = $this->inquiryProses->getInquiryVendor($id);
            
            $jumlah_permintaan = $this->request->getPost('jumlah_permintaan');
            $harga = $this->request->getPost('harga_satuan');
            $harga_total = $jumlah_permintaan * $harga;
            $tanggal = date('d-m-Y');

            $isi = [
                'id_vendor' => $data_vendor['id'],
                'id_penawaran' => $data_penawaran['id'],
                'harga_satuan' => $this->request->getPost('harga_satuan'),
                'harga_total' => $harga_total,
                'tanggal_kirim' => $tanggal,
                'durasi_pengiriman' => $this->request->getPost('durasi_pengiriman')

            ];

            $data_sebelumnya = $data_penawaran['confirm_vendor'];
            $id_for_update = $data_penawaran['id'];
            $data_confirm = $data_vendor['id'];
            if ($data_sebelumnya == null) {
                
                $this->inquiryProses->update($id_for_update, [
                    "status" => 'confirm vendor',
                    "confirm_vendor" => $data_vendor['id']
                ]);
            }else{
                $this->inquiryProses->update($id_for_update, [
                    "status" => 'confirm vendor',
                    "confirm_vendor" => "$data_sebelumnya, $data_confirm"
                ]);
            }
            

            $this->feedback_vendor->save($isi);
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Data Berhasil Diteruskan ke PT. Wakabe Indonesia</div>';
            return redirect()->to('vendor/incoming_request');
        }
        
    }

    public function successfully_send()
    {
        $data_vendor = user()->vendor;
        $hasil = $this->vendor->getValVendor($data_vendor);
        $confirm_vendor = $hasil['id'];
        $isi = $this->feedback_vendor->getDataSuccessfulySend($confirm_vendor);
        $data = [
            
            "judul" => "Successfully Send",
            'success' => $isi 
        ];
        return view('vendor/successfully_send', $data);
    }



}
