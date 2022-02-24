<?php

namespace App\Models;

use CodeIgniter\Model;


class VendorModel extends Model
{
    protected $table = 'vendor';
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'vendor', 'fullname', 'phone', 'jabatan', 'username', 'email', 'password', 'created_by'
    ];

    public function search($keyword)
    {
        $key1 = ['fullname' => $keyword];
        $key = ['vendor' => $keyword];
        $builder = $this->table('vendor');
        $builder->like($key);
        $builder->orLike($key1);
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
    

    // public function getConfirmInquiry    //     if ($id == false) {
    //         return $this->where('status', 'confirm valid')->ORDERBY('id', 'ASC')->findAll();
    
    //     return $this->where(['id' => $id])->first();
    // }

    // public function getPendingInquiry($id = false)
    // {
    //     if ($id == false) {
    //         return $this->where('status', 'Pending')->ORDERBY('id', 'ASC')->findAll();
    //     }
    //     return $this->where(['id' => $id])->first();
    // }
}
