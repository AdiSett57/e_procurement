<?php

namespace App\Models;

use CodeIgniter\Model;


class FeedbackVendorModel extends Model
{
    protected $table = 'feedback_vendor';
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id', 'id_vendor', 'id_penawaran', 'harga_satuan', 'harga_total', 'durasi_pengiriman','tanggal_kirim','status'
    ];

    public function search($keyword)
    {
        // $patokan = 'belum valid';
        $key = ['user' => $keyword, 'perusahaan' => $keyword];
        $builder = $this->table('vendor');
        $builder->like($key);
        return $builder;
    }


    public function getVendor($id = false)
    {
        if ($id == false) {
            // return $this->where('status', 'belum divalidasi')->ORDERBY('id', 'ASC')->findAll();
            return $this->table('vendor')->ORDERBY('id', 'DSC');
        }
        return $this->where(['id' => $id])->first();
    }


    public function getValVendor($dataVendor = false)
    {
        return $this->where(['vendor' => $dataVendor])->first();
    }

    public function getdataAjaxInponow($as)
    {

        return $this->where(['vendor'=>$as])->findAll();
    }
    
    public function getDataFeedbackVendor ()
    {
        return $this->db->table('feedback_vendor')
        ->join('penawaran','penawaran.id=feedback_vendor.id_penawaran')
        ->join('vendor','vendor.id=feedback_vendor.id_vendor')
        ->get()->getResult();
    }

    public function searchFeedbackVendor($keyword)
    {
        return $this->db->table('feedback_vendor')->like('no_spph', $keyword)
        ->join('penawaran', 'penawaran.id=feedback_vendor.id_penawaran')
        ->join('vendor', 'vendor.id=feedback_vendor.id_vendor')
        ->get()->getResult();
    }

    public function getDataSuccessfulySend($confirm_vendor)
    {
        return $this->db->table('feedback_vendor')->like('id_vendor', $confirm_vendor)
        ->join('penawaran', 'penawaran.id=feedback_vendor.id_penawaran')
        ->join('vendor', 'vendor.id=feedback_vendor.id_vendor')
        ->get()->getResultObject();
    }




}
