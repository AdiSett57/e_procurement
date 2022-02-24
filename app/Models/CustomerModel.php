<?php

namespace App\Models;

use CodeIgniter\Model;


class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'nama_perusahaan', 'alamat', 'pic', 'no_telp', 'email'
    ];


    function get_customer($nama_perusahaan){
        return $this->where(['nama_perusahaan' => $nama_perusahaan])->first();
    }

    public function getCustomer($id = false)
    {
        if ($id == false) {
            // return $this->where('status', 'belum divalidasi')->ORDERBY('id', 'ASC')->findAll();
            return $this->table('customer')->ORDERBY('id', 'DSC');
        }
        return $this->where(['id' => $id])->first();
    }

    public function search($keyword)
    {
        $key1 = ['pic' => $keyword];
        $key = ['nama_perusahaan' => $keyword];
        $builder = $this->table('customer');
        $builder->like($key);
        $builder->orLike($key1);
        return $builder;
    }

}
