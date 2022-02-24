<?php

namespace App\Models;

use CodeIgniter\Model;


class AnalisaHargaModel extends Model
{
    protected $table = 'analisa_harga';
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id','id_penawaran','id_vendor','no_procurement','pekerjaan','volume','satuan','hb_satuan','hb_total','margin','nilai_margin','hj_satuan','hj_total','jasa','harga_jasa','cost_of_money_volume','jumlah_COM','delivery_cost_volume','delivery_cost_satuan','jumlah_DC','pph_10', 'pph_10_volume','pph_22', 'pph_22_volume','pph_23', 'pph_23_volume','pph_final','pph_final_volume','gross_profit','marketing_cost','margin_marketing_cost','nett_profit','final_margin'
    ];
}
