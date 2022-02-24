<?php

namespace App\Models;

use CodeIgniter\Model;


class InquiryModel extends Model
{
    protected $table = 'penawaran';
    protected $useTimestamps = true;
    protected $allowedFields = [
       'id_customer', 'no_pbi', 'no_procurement', 'no_spph_masuk', 'no_spph_keluar', 'tanggal', 'nama_barang', 'volume', 'satuan', 'harga_satuan', 'jumlah', 'stok', 'durasi_pengiriman', 'vendor', 'inputed_by', 'approved_by', 'status', 'note', 'quantityRequest', 'kode_urut', 'confirm_vendor', 'status_terpilih','updated_at'
    ];

    function get_no_spph()
    {
        $param = date('m');
        $q = $this->db->query("SELECT MAX(RIGHT(no_spph_keluar,3)) AS kd_max FROM penawaran WHERE kode_urut= $param");
        $kd = "";
        if ($q->getResult() > 0) {
            foreach ($q->getResult() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'SPPH.' . 'WI.'. date('ym') . $kd;
    }

    public function search($keyword)
    {
        $patokan = 'requested';
        $deskripsi = ['status' => $patokan, 'nama_barang' => $keyword];
        $builder = $this->table('penawaran');
        $builder->like($deskripsi);
        return $builder;
    }

    public function searchProcurementProcess($keyword)
    {
        $patokan = 'on process';
        $deskripsi = ['status' => $patokan, 'nama_barang' => $keyword];
        $builder = $this->table('penawaran');
        $builder->like($deskripsi);
        return $builder;
    }

    public function searchFeedbackVendor($keyword)
    {
        $patokan = 'confirm vendor';
        $deskripsi = ['status' => $patokan, 'nama_barang' => $keyword];
        $builder = $this->table('penawaran');
        $builder->like($deskripsi);
        return $builder;
    }


    public function getInquiry($no_spph_masuk = false)
    {
        if ($no_spph_masuk == false) {
            return $this->table('penawaran')->like('status', 'requested')->ORDERBY('id', 'DSC');
        }
        return $this->where(['no_spph_masuk' => $no_spph_masuk]);
        
    }

    public function getProcurementProcess($no_spph_keluar = false)
    {
        if ($no_spph_keluar == false) {
            return $this->table('penawaran')->like('status', 'on process')->ORDERBY('id', 'DSC');
        }
        return $this->where(['no_spph_keluar' => $no_spph_keluar]);
    }

    public function getProcurementConfirm($no_spph_keluar = false)
    {
        
        if ($no_spph_keluar == false) {
            return $this->where(['no_spph_keluar' => $no_spph_keluar]);
        }
        return $this->table('penawaran')->like('status_terpilih', 'confirm');
        
    }

    public function getAnalisaHarga($no_spph_keluar = false)
    {

        if ($no_spph_keluar == false) {
            return $this->table('penawaran')->like('status_terpilih', 'confirm');
        }
        return $this->where(['no_spph_keluar' => $no_spph_keluar]);
        
    }

    public function getPrintQuotation($no_procurement)
    {
        return $this->where(['no_procurement' => $no_procurement])->like('status_terpilih', 'confirm');
    }

    public function getInquiryVendor($id = false)
    {
        if ($id == false) {
            // return $this->where('status', 'belum divalidasi')->ORDERBY('id', 'ASC')->findAll();
            return $this->table('penawaran')->like('vendor', user()->vendor)->ORDERBY('id', 'DSC');
        }
        return $this->where(['id' => $id])->first();
    }

    public function getConfirmInquiry($id = false)
    {
        if ($id == false) {
            return $this->where('status', 'confirm valid')->ORDERBY('id', 'ASC')->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

   

    public function getFeedbackVendor($id = false)
    {
        if ($id == false) {
            return $this->table('penawaran')->like('status', 'confirm vendor')->ORDERBY('id', 'DSC');
        }
        return $this->where(['id' => $id])->first();
    }

    public function getSpph($spph, $vendor){
        return $this->where(['no_spph_keluar' => $spph, ['vendor' => $vendor]]);
    }
}
