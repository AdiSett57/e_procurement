<?php

namespace App\Controllers;

use \App\Models\InquiryModel;
use \App\Models\VendorModel;
use \App\Models\FeedbackVendorModel;
use \App\Models\LogModel;
use \App\Models\CustomerModel;
use \App\Models\AnalisaHargaModel;

class Admin extends BaseController
{
    protected $db, $builder, $inquiryProses, $pager, $vendor, $feedbackVendor, $penawaran, $daftarVendor, $log, $customer, $customer_entity, $analisa_harga, $log_builder;

    public function __construct()
    {
        $this->analisa_harga = new AnalisaHargaModel();
        $this->customer = new CustomerModel();
        $this->log = new LogModel();
        $this->feedbackVendor = new FeedbackVendorModel();
        $this->vendor = new VendorModel();
        $this->pager = \Config\Services::pager();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->penawaran = $this->db->table('penawaran');
        $this->daftarVendor = $this->db->table('vendor');
        $this->customer_entity = $this->db->table('customer');
        $this->log_builder = $this->db->table('log');
        $this->inquiryProses = new inquiryModel();
    }


    public function cekLog()
    {
        date_default_timezone_set("ASIA/JAKARTA");
        $last_login = date('Y-m-d H:i:s');
        $nama_user = user()->username;
        $perangkat = $_SERVER['HTTP_USER_AGENT'];

        $ip = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ip = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = 'IP tidak dikenali';

        $this->log->save([
            'nama_user' => $nama_user,
            'last_login'  => $last_login,
            'perangkat'  => $perangkat,
            'ip'  => $ip
        ]);
        return redirect()->to(base_url('logout'));
    }


    public function index()
    {
        $query = $this->penawaran->like('status', 'requested');
        $count_request = $query->countAllResults();

        $query = $this->builder->like('vendor', 'local_user');
        $count_local_user = $query->countAllResults();

        $query = $this->builder->notLike('vendor', 'local_user');
        $count_notLocal_user = $query->countAllResults();

        $query = $this->daftarVendor;
        $count_vendor = $query->countAllResults();

        $query_proses = $this->penawaran->like('status', 'on process');
        $count_proses = $query_proses->countAllResults();

        $query_confirm = $this->penawaran->like('status', 'confirm vendor');
        $count_confirm = $query_confirm->countAllResults();

        $query_quotation = $this->penawaran->like('status_terpilih', 'confirm');
        $count_quotation = $query_quotation->countAllResults();

        $query_chart = $this->inquiryProses->where('status', 'confirm vendor')->findAll();
        $quantity = $query_chart;

        $this->builder->select('username as username, id');
        $query = $this->builder->get();
        $users = $query->getResult();
        $data_log = $this->log->orderBy('id_log', 'DESC')->findAll();

        $lama = 28;
        $hapus_log_otomatis = $this->db->query("DELETE FROM log WHERE DATEDIFF(CURDATE(), last_login) > $lama");

        $data = [
            'data_log' => $data_log,
            'users' => $users,
            'count_local_user' => $count_local_user,
            'count_notLocal_user' => $count_notLocal_user,
            'count_vendor' => $count_vendor,
            'quantity' => $quantity,
            'vendor' => $this->vendor->findAll(),
            'count_quotation' => $count_quotation,
            'count_confirm' => $count_confirm,
            'count_request' => $count_request,
            'count_proses' => $count_proses,
            'judul' => 'Dashboard'
        ];

        return view('admin/index', $data);
    }

    public function setPesan($tipe)
    {
        session()->setFlashData($tipe, 'Pesan ' . $tipe);
        return redirect()->to(base_url('/dashboard'));
    }

    //---------------------------------- Controller User --------------------------
    public function userList()
    {
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();
        $this->builder->select('users.id as userid, username, email, name, vendor');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $users = $query->getResult();
        $data = [
            'judul' => 'User List',
            'us' => $users
        ];

        return view('admin/userList', $data);
    }

    public function vendorList()
    {
        $currentPage = $this->request->getVar('page_vendor') ? $this->request->getVar('page_vendor') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $isi = $this->vendor->search($keyword);
        } else {
            $isi = $this->vendor->getVendor();
        }
        $data = [
            "judul" => "List Vendors",
            'vendorList' => $isi->paginate(6, 'vendor'),
            'pager' => $isi->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/vendorList', $data);
    }

    public function detail($id = 0)
    {
        $data = [
            'judul' => 'User Detail'
        ];

        $this->builder->select('users.id as userid, username, email, phone, fullname, user_image, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        return view('admin/detail', $data);
    }


    // -------------------------Controller Procurement ----------------------

    public function inputData()
    {

        $data = [
            "nama_perusahaan" => $this->customer->findAll(),
            "judul" => "Input Data"
        ];
        return view('admin/inputData', $data);
    }

    public function get_customer_onInput()
    {
        $nama_perusahaan = $this->request->getVar('nama_perusahaan');
        $data = $this->customer->get_customer($nama_perusahaan);
        echo json_encode($data);
    }



    public function tambahData()
    {
        $input = new \App\Models\InquiryModel();
        if ($this->request->getMethod() === 'post' && $this->validate([
            'deskripsi' => 'required|min_length[3]|max_length[255]',
            'keterangan'  => 'required',
        ])) {
            $input->save([
                'tanggal' => $this->request->getPost('tanggal'),
                // 'slug'  => url_title($this->request->getPost('title'), '-', true),
                'deskripsi'  => $this->request->getPost('deskripsi'),
                'nilai'  => $this->request->getPost('nilai'),
                'perusahaan'  => $this->request->getPost('perusahaan'),
                'user'  => $this->request->getPost('user'),
                'no_telp'  => $this->request->getPost('no_telp'),
                'sales'  => $this->request->getPost('sales'),
                'status'  => $this->request->getPost('status'),
                'keterangan'  => $this->request->getPost('keterangan'),
            ]);

            $data = [
                "judul" => "Inquiry Proses"
            ];
            return redirect()->to('/admin/inquiryProsses');
        } else {
            $data = [
                "judul" => "Input Data"
            ];
            echo view('admin/inputData', $data);
        }
    }


    public function procurementRequest()
    {

        $currentPage = $this->request->getVar('page_penawaran') ? $this->request->getVar('page_penawaran') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $isi = $this->inquiryProses->search($keyword)->select('penawaran.no_spph_masuk, penawaran.id_customer, penawaran.tanggal, customer.nama_perusahaan, penawaran.volume, penawaran.status, penawaran.inputed_by, penawaran.id as id')->join('customer', 'customer.id=penawaran.id_customer')->where('penawaran.status', 'requested')->ORDERBY('penawaran.id', 'DESC')->groupBy('no_spph_masuk');
        } else {
            $this->inquiryProses->select('penawaran.no_spph_masuk, penawaran.id_customer, penawaran.tanggal, customer.nama_perusahaan, penawaran.volume, penawaran.status, penawaran.inputed_by, penawaran.id as id')->join('customer', 'customer.id=penawaran.id_customer')->where('penawaran.status', 'requested')->ORDERBY('penawaran.id', 'DESC');
            $this->inquiryProses->groupBy('no_spph_masuk');

            $isi = $this->inquiryProses;
        }
        $data = [
            "judul" => "Procurement Request",
            'inquiryProses' => $isi->paginate(6, 'penawaran'),
            'pager' => $isi->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/procurementRequest', $data);
    }

    public function procurementRequestDetail($no_spph_masuk)
    {
        $parameter = $this->inquiryProses->getInquiry($no_spph_masuk);
        $detailInquiryProses = $parameter->join('customer', 'customer.id=penawaran.id_customer')->ORDERBY('penawaran.id', 'ASC')->findAll();
        $no_spph = $this->inquiryProses->get_no_spph();

        $data = [
            'no_spph_keluar' => $no_spph,
            'judul' => 'Procurement Request / Detail',
            'detailInquiryProses' => $detailInquiryProses,
            'vendor' => $this->vendor->findAll()
        ];

        return view('admin/procurementRequestDetail', $data);
    }

    public function procurementProcessDetail($no_spph_keluar)
    {

        $ambil = $this->inquiryProses->getProcurementProcess($no_spph_keluar);
        $detailInquiryProses = $ambil->join('customer', 'customer.id=penawaran.id_customer')->findAll();
        $vendor = $this->inquiryProses->getProcurementProcess($no_spph_keluar)->first();
        $dataVendor = $vendor['vendor'];

        $ubahArray = explode(",", $dataVendor);

        $data = [
            'judul' => 'Detail Process',
            'detailProcess' => $detailInquiryProses,
            'dataVendor' => $ubahArray,
            'vendor' => $this->vendor->getValVendor($dataVendor)
        ];

        return view('admin/procurementProcessDetail', $data);
    }

    public function confirmProcurementRequest($no_spph_masuk)
    {
        $data = [
            'judul' => 'Procurement Request / Detail',
            'detailInquiryProses' => $this->inquiryProses->getInquiry($no_spph_masuk)
        ];

        $vendor = implode(", ", $_POST['vendor']);
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'no_spph_keluar' => 'required',
            'vendor' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->db->query("UPDATE penawaran SET no_spph_keluar = '" . $this->request->getPost('no_spph_keluar') . "', vendor = '" . $vendor . "', status = 'on process', approved_by = '" . user()->username . "' WHERE no_spph_masuk = '" . $no_spph_masuk . "'");

            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Data Berhasil Diteruskan Ke Vendor</div>';
            return redirect()->to('/admin/procurementRequest');
        }

        // tampilkan form edit
        $_SESSION["success"] = '<div class="alert alert-danger" role="alert">Gagal Memproses Data</div>';
        return redirect()->to('/admin/procurementRequest');
    }

    public function procurementDelete($id)
    {

        $delete = $this->inquiryProses->where('id', $id)->delete();
        $data = ['inquiryProses' => $this->inquiryProses->getInquiry()];
        if ($delete) {
            return redirect()->to('/admin/procurementProcess');
        } else {
            echo "gagal nih bos";
            return view('admin/procurementProcess', $data);
        }
    }

    public function procurementProcessDelete($no_spph_keluar)
    {

        $delete = $this->inquiryProses->where('no_spph_keluar', $no_spph_keluar)->delete();
        $data = ['inquiryProses' => $this->inquiryProses->getInquiry()];
        if ($delete) {
            return redirect()->to('/admin/procurementProcess');
        } else {
            echo "gagal nih bos";
            return view('admin/procurementProcess', $data);
        }
    }

    public function procurementRequestDelete($no_spph_masuk)
    {

        $delete = $this->inquiryProses->where('no_spph_masuk', $no_spph_masuk)->delete();
        $data = ['inquiryProses' => $this->inquiryProses->getInquiry()];
        if ($delete) {
            return redirect()->to('/admin/procurementRequest');
        } else {
            echo "gagal nih bos";
            return view('admin/procurementRequest', $data);
        }
    }


    public function procurementConfirm()
    {
        $no_spph = $this->request->getPost('pilih_spph');
        if ($no_spph === 'terbaru') {
            $this->inquiryProses->select('penawaran.id as id, id_customer, no_spph_masuk, no_spph_keluar, no_procurement, tanggal, nama_barang, volume, satuan, vendor, approved_by, status_terpilih, confirm_vendor, status_terpilih, feedback_vendor.id as feedback_id, feedback_vendor.updated_at as updated_at, id_vendor, id_penawaran, harga_satuan, harga_total, feedback_vendor.status as status, customer.id as customer_id, nama_perusahaan, alamat, pic, no_telp');
            $this->inquiryProses->join('feedback_vendor', 'feedback_vendor.id_penawaran=penawaran.id');
            $this->inquiryProses->join('customer', 'customer.id=penawaran.id_customer')->where('feedback_vendor.status', 'terpilih')->ORDERBY('updated_at', 'DESC')->groupBy('no_procurement');
            $query = $this->inquiryProses->get();
            $dat_feedback = $query->getResult();

            $this->penawaran->distinct();
            $this->penawaran->select('no_procurement');
            $this->penawaran->where('status_terpilih', 'confirm');
            $query = $this->penawaran->get();
            $no_procurement = $query->getResult();

            $this->penawaran->select('penawaran.id_customer as id_customer, customer.nama_perusahaan as nama_perusahaan');
            $this->penawaran->where('status_terpilih', 'confirm');
            $this->penawaran->join('customer', 'customer.id=penawaran.id_customer');
            $this->penawaran->distinct();
            $this->penawaran->select('nama_perusahaan');
            $query = $this->penawaran->get();
            $customer = $query->getResult();

            $data = [
                "judul" => "Feedback Vendor",
                "data_feedback" => $dat_feedback,
                "no_procurement" => $no_procurement,
                "customer" => $customer

            ];
            return view('admin/procurementConfirm', $data);
        } else {

            $this->inquiryProses->select('penawaran.id as id, id_customer, no_spph_masuk, no_spph_keluar, no_procurement, tanggal, nama_barang, volume, satuan, vendor, approved_by, status_terpilih, confirm_vendor, status_terpilih, feedback_vendor.id as feedback_id, feedback_vendor.updated_at as updated_at, id_vendor, id_penawaran, harga_satuan, harga_total, feedback_vendor.status as status, customer.id as customer_id, nama_perusahaan, alamat, pic, no_telp');
            $this->inquiryProses->join('feedback_vendor', 'feedback_vendor.id_penawaran=penawaran.id');
            $this->inquiryProses->join('customer', 'customer.id=penawaran.id_customer')->where('feedback_vendor.status', 'terpilih')->ORDERBY('updated_at', 'ASC')->groupBy('no_procurement');
            $query = $this->inquiryProses->get();
            $dat_feedback = $query->getResult();

            $this->penawaran->distinct();
            $this->penawaran->select('no_procurement');
            $this->penawaran->where('status_terpilih', 'confirm');
            $query = $this->penawaran->get();
            $no_procurement = $query->getResult();

            $this->penawaran->select('penawaran.id_customer as id_customer, customer.nama_perusahaan as nama_perusahaan');
            $this->penawaran->where('status_terpilih', 'confirm');
            $this->penawaran->join('customer', 'customer.id=penawaran.id_customer');
            $this->penawaran->distinct();
            $this->penawaran->select('nama_perusahaan');
            $query = $this->penawaran->get();
            $customer = $query->getResult();

            $data = [
                "judul" => "Procurement Confirm",
                "data_feedback" => $dat_feedback,
                "no_procurement" => $no_procurement,
                "customer" => $customer

            ];
            return view('admin/procurementConfirm', $data);
        }
    }

    public function procurementConfirmDetail($no_spph_keluar)
    {

        $ambil = $this->inquiryProses->getProcurementConfirm($no_spph_keluar);

        $detail_procurement = $ambil->join('feedback_vendor', 'feedback_vendor.id_penawaran=penawaran.id')->where('feedback_vendor.status', 'terpilih')->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->join('customer', 'customer.id=penawaran.id_customer')->findAll();

        $detail_vendor = $ambil->join('feedback_vendor', 'feedback_vendor.id_penawaran=penawaran.id')->where('feedback_vendor.status', 'terpilih')->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->join('customer', 'customer.id=penawaran.id_customer')->groupBy('id_vendor')->findAll();

        $data = [
            'judul' => 'Detail Process',
            'detailProcess' => $detail_procurement,
            'dataVendor' => $detail_vendor,
        ];

        return view('admin/procurementConfirmDetail', $data);
    }

    public function analisaHarga($no_spph_keluar)
    {
        $ambil = $this->inquiryProses->getAnalisaHarga($no_spph_keluar);

        $detail_procurement = $ambil->join('feedback_vendor', 'feedback_vendor.id_penawaran=penawaran.id')->where('feedback_vendor.status', 'terpilih')->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->join('customer', 'customer.id=penawaran.id_customer')->join('analisa_harga', 'analisa_harga.id_penawaran=feedback_vendor.id_penawaran')->findAll();


        $detail_vendor = $ambil->join('feedback_vendor', 'feedback_vendor.id_penawaran=penawaran.id')->where('feedback_vendor.status', 'terpilih')->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->join('customer', 'customer.id=penawaran.id_customer')->groupBy('id_vendor')->findAll();

        $data = [
            'judul' => 'Analisa Harga',
            'detailProcess' => $detail_procurement,
            'dataVendor' => $detail_vendor,
        ];

        return view('admin/analisaHarga', $data);
    }

    public function printAnalisa($no_spph_keluar)
    {
        $ambil = $this->inquiryProses->getAnalisaHarga($no_spph_keluar);

        $detail_procurement = $ambil->join('feedback_vendor', 'feedback_vendor.id_penawaran=penawaran.id')->where('feedback_vendor.status', 'terpilih')->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->join('customer', 'customer.id=penawaran.id_customer')->join('analisa_harga', 'analisa_harga.id_penawaran=feedback_vendor.id_penawaran')->findAll();


        $detail_vendor = $ambil->join('feedback_vendor', 'feedback_vendor.id_penawaran=penawaran.id')->where('feedback_vendor.status', 'terpilih')->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->join('customer', 'customer.id=penawaran.id_customer')->groupBy('id_vendor')->findAll();

        $data = [
            'judul' => 'Analisa Harga',
            'detailProcess' => $detail_procurement,
            'dataVendor' => $detail_vendor,
        ];

        return view('admin/printAnalisa', $data);
    }

    public function hitung_analisa()
    {
        if ($this->request->isAJAX()) {

            $id_penawaran = $this->request->getVar('id_penawaran');
            $margin = $this->request->getVar('margin');
            $root = $this->analisa_harga->where('id_penawaran', $id_penawaran)->first();
            $hb_satuan = $root['hb_satuan'];
            $volume = $root['volume'];
            $persen = $margin / 100;
            $nilai_margin = $hb_satuan * $persen;
            $hj_satuan = $hb_satuan + $nilai_margin;
            $hj_total = $hj_satuan * $volume;

            $data = [
                'margin' => $margin,
                'nilai_margin' => $nilai_margin,
                'hj_satuan' => $hj_satuan,
                'hj_total' => $hj_total
            ];

            $this->analisa_harga->where('id_penawaran', $id_penawaran)->set($data)->update();
        }
    }

    public function last_table()
    {
        if ($this->request->isAJAX()) {
            $no_procurement = $this->request->getPost('no_procurement');
            $gross_profit = $this->request->getPost('gross_profit');
            $margin_marketing_cost = $this->request->getPost('margin_marketing_cost');
            $sub_hj = $this->request->getPost('sub_hj');

            $persen = $margin_marketing_cost / 100;
            $nilai_marketing_cost = $gross_profit * $persen;

            $nilai_nett_profit = $gross_profit - $nilai_marketing_cost;
            $decimal = $nilai_nett_profit / $sub_hj;
            $to_persen = $decimal * 100;
            $final_margin = round($to_persen, 2);

            $data = [
                'gross_profit' => $gross_profit,
                'margin_marketing_cost' => $margin_marketing_cost,
                'marketing_cost' => $nilai_marketing_cost,
                'nett_profit' => $nilai_nett_profit,
                'final_margin' => $final_margin
            ];
            $this->analisa_harga->where('no_procurement', $no_procurement)->set($data)->update();
        }
    }

    public function reset_analisa_harga()
    {
        if ($this->request->isAJAX()) {
            $no_procurement = $this->request->getPost('no_procurement');
            $data = [
                'margin' => '',
                'nilai_margin' => '',
                'pekerjaan' => '-',
                'hj_satuan' => '',
                'hj_total' => null,
                'jasa' => '',
                'harga_jasa' => '',
                'cost_of_money_volume' => null,
                'delivery_cost_volume' => null,
                'delivery_cost_satuan' => null,
                'jumlah_DC' => '',
                'jumlah_COM' => '',
                'pph_10' => '',
                'pph_10_volume' => null,
                'pph_22' => '',
                'pph_22_volume' => null,
                'pph_23' => '',
                'pph_23_volume' => null,
                'pph_final' => '',
                'pph_final_volume' => null,
                'gross_profit' => '',
                'margin_marketing_cost' => null,
                'marketing_cost' => '',
                'nett_profit' => '',
                'final_margin' => '',
            ];
            $this->analisa_harga->where('no_procurement', $no_procurement)->set($data)->update();
        }
    }

    public function sendPekerjaanAnalisa()
    {
        if ($this->request->isAJAX()) {

            $no_procurement = $this->request->getVar('no_procurement');
            $pekerjaan = $this->request->getVar('pekerjaan');
            $data = [
                'pekerjaan' => $pekerjaan
            ];
            $this->analisa_harga->where('no_procurement', $no_procurement)->set($data)->update();
        }
    }

    public function sendJasaAnalisa()
    {
        if ($this->request->isAJAX()) {

            $no_procurement = $this->request->getVar('no_procurement');
            $jasa = $this->request->getVar('jasa');
            $harga_jasa = $this->request->getVar('harga_jasa');
            $data = [
                'jasa' => $jasa,
                'harga_jasa' => $harga_jasa
            ];
            $this->analisa_harga->where('no_procurement', $no_procurement)->set($data)->update();
        }
    }

    public function indirectCost()
    {
        if ($this->request->isAJAX()) {

            $no_procurement = $this->request->getVar('no_procurement');
            $cost_of_money_volume = $this->request->getVar('cost_of_money_volume');
            $cost_of_money_satuan = $this->request->getVar('cost_of_money_satuan');
            $jumlah_COM = $this->request->getVar('jumlah_COM');
            $delivery_cost_volume = $this->request->getVar('delivery_cost_volume');
            $delivery_cost_satuan = $this->request->getVar('delivery_cost_satuan');
            $jumlah_DC = $this->request->getVar('jumlah_DC');
            $pph_10_volume = $this->request->getVar('pph_10_volume');
            $pph_10 = $this->request->getVar('pph_10');
            $pph_22_volume = $this->request->getVar('pph_22_volume');
            $pph_22 = $this->request->getVar('pph_22');
            $pph_23_volume = $this->request->getVar('pph_23_volume');
            $pph_23 = $this->request->getVar('pph_23');
            $pph_final_volume = $this->request->getVar('pph_final_volume');
            $pph_final = $this->request->getVar('pph_final');

            $data = [
                'cost_of_money_volume' => $cost_of_money_volume,
                'cost_of_money_satuan' => $cost_of_money_satuan,
                'jumlah_COM' => $jumlah_COM,
                'delivery_cost_volume' => $delivery_cost_volume,
                'delivery_cost_satuan' => $delivery_cost_satuan,
                'jumlah_DC' => $jumlah_DC,
                'pph_10_volume' => $pph_10_volume,
                'pph_10' => $pph_10,
                'pph_22_volume' => $pph_22_volume,
                'pph_22' => $pph_22,
                'pph_23_volume' => $pph_23_volume,
                'pph_23' => $pph_23,
                'pph_final_volume' => $pph_final_volume,
                'pph_final' => $pph_final
            ];
            $this->analisa_harga->where('no_procurement', $no_procurement)->set($data)->update();
        }
    }



    public function backConfirm()
    {
        return redirect()->to('/admin/procurementConfirm');
    }

    public function procurementProcess()
    {
        $currentPage = $this->request->getVar('page_penawaran') ? $this->request->getVar('page_penawaran') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $isi = $this->inquiryProses->searchProcurementProcess($keyword)->select('penawaran.no_spph_masuk, penawaran.vendor, penawaran.approved_by, penawaran.no_spph_keluar, penawaran.id_customer, penawaran.tanggal, customer.nama_perusahaan, penawaran.volume, penawaran.status, penawaran.inputed_by, penawaran.id as id')->join('customer', 'customer.id=penawaran.id_customer')->where('penawaran.status', 'on process')->ORDERBY('penawaran.id', 'DESC')->groupBy('no_spph_keluar');
        } else {
            $this->inquiryProses->select('penawaran.no_spph_masuk, penawaran.no_spph_keluar, penawaran.vendor, penawaran.approved_by, penawaran.id_customer, penawaran.tanggal, customer.nama_perusahaan, penawaran.volume, penawaran.status, penawaran.inputed_by, penawaran.id as id')->join('customer', 'customer.id=penawaran.id_customer')->where('penawaran.status', 'on process')->ORDERBY('penawaran.id', 'DESC');
            $this->inquiryProses->groupBy('no_spph_keluar');

            $isi = $this->inquiryProses;
        }
        $this->penawaran->distinct();
        $this->penawaran->select('no_spph_keluar');
        $this->penawaran->where('status', 'on process');
        $query = $this->penawaran->get();
        $spph = $query->getResult();

        $this->daftarVendor->distinct();
        $this->daftarVendor->select('vendor');
        $query1 = $this->daftarVendor->get();
        $vendorDipilih = $query1->getResult();

        $data = [
            "judul" => "Procurement Process",
            'inquiryProses' => $isi->paginate(6, 'penawaran'),
            'pager' => $isi->pager,
            'currentPage' => $currentPage,
            'spph' => $spph,
            'vendor' => $vendorDipilih
        ];
        return view('admin/procurementProcess', $data);
    }

    public function feedbackVendor()
    {
        $opsi = $this->request->getPost('opsi');
        $nama_barang = $this->request->getPost('pilih_spph');
        if ($opsi) {
            switch ($opsi) {
                case "harga termurah":
                    $this->feedbackVendor->select('feedback_vendor.id as id, id_vendor, id_penawaran, tanggal, no_spph_keluar, vendor.vendor as vendor, id_customer, nama_barang, volume, harga_satuan, harga_total, durasi_pengiriman')->orderbY('harga_total', 'ASC');
                    $this->feedbackVendor->join('penawaran', 'penawaran.id=feedback_vendor.id_penawaran')->where('nama_barang', $nama_barang);
                    $this->feedbackVendor->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->where('feedback_vendor.status', 'pengajuan');
                    $query = $this->feedbackVendor->get();
                    $dat_feedback = $query->getResult();


                    $this->penawaran->distinct();
                    $this->penawaran->select('nama_barang');
                    $this->penawaran->like(['status' => 'confirm vendor', 'status_terpilih' => 'pending']);
                    $query = $this->penawaran->get();
                    $nama_barang = $query->getResult();
                    $data = [
                        "judul" => "Feedback Vendor",
                        "data_feedback" => $dat_feedback,
                        "deskripsi" => $nama_barang

                    ];
                    return view('admin/feedbackVendor', $data);
                    break;
                case "pengiriman tercepat":
                    $this->feedbackVendor->select('feedback_vendor.id as id, id_vendor, id_penawaran, tanggal, no_spph_keluar, vendor.vendor as vendor, id_customer, nama_barang, volume, harga_satuan, harga_total, durasi_pengiriman');
                    $this->feedbackVendor->join('penawaran', 'penawaran.id=feedback_vendor.id_penawaran')->where('nama_barang', $nama_barang);
                    $this->feedbackVendor->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->where('feedback_vendor.status', 'pengajuan')->ORDERBY('durasi_pengiriman', 'ASC');
                    $query = $this->feedbackVendor->get();
                    $dat_feedback = $query->getResult();
                    $this->penawaran->distinct();
                    $this->penawaran->select('nama_barang');
                    $this->penawaran->like(['status' => 'confirm vendor', 'status_terpilih' => 'pending']);
                    $query = $this->penawaran->get();
                    $nama_barang = $query->getResult();
                    $data = [
                        "judul" => "Feedback Vendor",
                        "data_feedback" => $dat_feedback,
                        "deskripsi" => $nama_barang

                    ];
                    return view('admin/feedbackVendor', $data);
                    break;
                default:
                    $this->feedbackVendor->select('feedback_vendor.id as id, id_vendor, id_penawaran, tanggal, no_spph_keluar, vendor.vendor as vendor, id_customer, nama_barang, volume, harga_satuan, harga_total, durasi_pengiriman', 'feedback_vendor.status as status');
                    $this->feedbackVendor->join('penawaran', 'penawaran.id=feedback_vendor.id_penawaran');
                    $this->feedbackVendor->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->where('feedback_vendor.status', 'pengajuan')->ORDERBY('id_penawaran', 'DESC');
                    $query = $this->feedbackVendor->get();
                    $dat_feedback = $query->getResult();
                    $this->penawaran->distinct();
                    $this->penawaran->select('nama_barang');
                    $this->penawaran->like(['status' => 'confirm vendor', 'status_terpilih' => 'pending']);
                    $query = $this->penawaran->get();
                    $nama_barang = $query->getResult();
                    $data = [
                        "judul" => "Feedback Vendor",
                        "data_feedback" => $dat_feedback,
                        "deskripsi" => $nama_barang

                    ];
                    return view('admin/feedbackVendor', $data);
            }
        } else {
            $this->feedbackVendor->select('feedback_vendor.id as id, id_vendor, id_penawaran, tanggal, no_spph_keluar, vendor.vendor as vendor, id_customer, nama_barang, volume, harga_satuan, harga_total, durasi_pengiriman');
            $this->feedbackVendor->join('penawaran', 'penawaran.id=feedback_vendor.id_penawaran');
            $this->feedbackVendor->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->where('feedback_vendor.status', 'pengajuan')->ORDERBY('id_penawaran', 'DESC');
            $query = $this->feedbackVendor->get();
            $dat_feedback = $query->getResult();

            $this->feedbackVendor->distinct();
            $this->feedbackVendor->select('penawaran.nama_barang as nama_barang');
            $this->feedbackVendor->join('penawaran', 'penawaran.id=feedback_vendor.id_penawaran');
            $this->feedbackVendor->like(['feedback_vendor.status' => 'pengajuan']);
            $query = $this->feedbackVendor->get();
            $nama_barang = $query->getResult();
            $data = [
                "judul" => "Feedback Vendor",
                "data_feedback" => $dat_feedback,
                "deskripsi" => $nama_barang


            ];
            return view('admin/feedbackVendor', $data);
        }
    }

    public function feedbackVendorConfirm($id)
    {
        $cari_id_penawaran = $this->feedbackVendor->where('id', $id)->first();
        $id_penawaran = $cari_id_penawaran['id_penawaran'];
        $ambil = $this->feedbackVendor->where('id_penawaran', $id_penawaran);
        $filter = $ambil->notLike('id', $id);
        $id_arsip = $filter->id;
        $arsipkan = $this->feedbackVendor->update($id_arsip, ["status" => "arsipkan"]);

        $cari_spph_keluar = $this->inquiryProses->where('id', $id_penawaran)->first();
        $no_spph_keluar = $cari_spph_keluar['no_spph_keluar'];
        $no = substr($no_spph_keluar, 8);
        $no_procurement = "IO.WI." . $no;

        $ambil_data_feedback = $this->feedbackVendor->where('id', $id)->first();
        $ambil_data_penawaran = $this->inquiryProses->where('id', $id_penawaran)->first();
        $id_vendor = $ambil_data_feedback['id_vendor'];
        $volume = $ambil_data_penawaran['volume'];
        $satuan = $ambil_data_penawaran['satuan'];
        $hb_satuan = $ambil_data_feedback['harga_satuan'];
        $hb_total = $ambil_data_feedback['harga_total'];


        $data = [
            'id_penawaran' => $id_penawaran,
            'id_vendor'    => $id_vendor,
            'no_procurement' => $no_procurement,
            'volume'        => $volume,
            'satuan'        => $satuan,
            'hb_satuan'     => $hb_satuan,
            'hb_total'      => $hb_total,
        ];

        $this->analisa_harga->save($data);



        $perbaruhi = $this->inquiryProses->update($id_penawaran, [
            "no_procurement" => $no_procurement,
            "status_terpilih" => "confirm"
        ]);
        $update =  $this->feedbackVendor->update($id, [
            "status" => "terpilih"
        ]);
        if ($update) {
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Berhasil Memilih Data</div>';
            return redirect()->to('/admin/feedbackVendor');
        } else {
            $_SESSION["success"] = '<div class="alert alert-warning" role="alert">Gagal Memilih Data</div>';
            return redirect()->to('/admin/feedbackVendor');
        }
    }

    public function feedbackVendorArsipkan()
    {

        $currentPage = $this->request->getVar('page_penawaran') ? $this->request->getVar('page_penawaran') : 1;
        $this->feedbackVendor->select('feedback_vendor.id as id, id_vendor, id_penawaran, tanggal, no_spph_keluar, vendor.vendor as vendor, id_customer, nama_barang, volume, harga_satuan, harga_total, durasi_pengiriman', 'feedback_vendor.status as status');
        $this->feedbackVendor->join('penawaran', 'penawaran.id=feedback_vendor.id_penawaran');
        $this->feedbackVendor->join('vendor', 'vendor.id=feedback_vendor.id_vendor')->where('feedback_vendor.status', 'arsipkan')->ORDERBY('id_penawaran', 'DESC');
        $isi = $this->feedbackVendor;
        $data = [
            "judul" => "Diarsipkan",
            'data_feedback' => $isi->paginate(6, 'penawaran'),
            'pager' => $isi->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/arsipkan', $data);
    }

    public function feedbackVendorPindahkan($id)
    {
        $update = $this->feedbackVendor->update($id, ["status" => "pengajuan"]);
        $cari_id_penawaran = $this->feedbackVendor->where('id', $id)->first();
        $id_penawaran = $cari_id_penawaran['id_penawaran'];
        $kembalikan = $this->feedbackVendor->like(["id_penawaran" => $id_penawaran, "status" => "terpilih"])->first();
        $id_kembalikan = $kembalikan['id'];
        $update = $this->feedbackVendor->update($id_kembalikan, ["status" => "pengajuan"]);
        $update = $this->inquiryProses->update($id_penawaran, ["status_terpilih" => "pending", "no_procurement" => null]);
        if ($update) {
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Data berhasil dipindahkan dari arsip</div>';
            return redirect()->to('/admin/feedbackVendor');
        } else {
            $_SESSION["danger"] = '<div class="alert alert-warning" role="alert">Gagal memindahkan data</div>';
            return redirect()->to('admin/feedbackVendorArsipkan');
        }
    }



    public function feedbackVendorDelete($id)
    {
        $cari = $this->feedbackVendor->find($id);
        $id_penawaran = $cari['id_penawaran'];
        $delete_penawaran = $this->inquiryProses->where('id', $id_penawaran)->delete();
        $delete = $this->feedbackVendor->where('id', $id)->delete();
        if ($delete) {
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Berhasil menghapus data</div>';
            return redirect()->to('/admin/feedbackVendor');
        } else {
            $_SESSION["danger"] = '<div class="alert alert-warning" role="alert">Gagal Menghapus data</div>';
            return redirect()->to('admin/feedbackVendor');
        }
    }

    public function vendorDetail($id)
    {
        $vendorDetail = $this->vendor->find($id);
        $username = $vendorDetail['username'];
        $this->builder->select('*')->where('username', $username);
        $query = $this->builder->get();
        $user = $query->getRow();
        $parHps = $user->id;

        $data = [
            "judul" => "Vendor detail",
            "vendor" => $vendorDetail,
            "user" => $user,
            "idHps" => $parHps
        ];
        return view('admin/vendorDetail', $data);
    }

    public function printSpph()
    {
        $spph = $this->request->getPost('pilih_spph');
        $vendor = $this->request->getPost('pilih_vendor');
        $dataVendor = $vendor;
        $vendorUp = $this->vendor->getValVendor($dataVendor);

        $query   = $this->db->query('SELECT * FROM penawaran WHERE no_spph_keluar = "' . $spph . '" AND vendor LIKE "%' . $vendor . '%"');
        $con = $query->getResult();
        foreach ($con as $dat) {
            $isi = $dat;
        }

        if ($con) {
            $data = [
                "con" => $con,
                "isi" => $isi,
                "datVen" => $vendorUp,
                "judul" => 'print'
            ];
            return view('admin/cetakSpph', $data);
        } else {
            $_SESSION["success"] = '<div class="alert alert-warning" role="alert">No Spph tersebut tidak ditujukan untuk vendor yang dipilih </div>';
            return redirect()->to('admin/procurementProcess');
        }
    }

    public function printQuotation($no_procurement)
    {
        $ambil = $this->analisa_harga->where('analisa_harga.no_procurement', $no_procurement);

        $detail_procurement = $ambil->join('penawaran', 'penawaran.id=analisa_harga.id_penawaran')->join('customer', 'customer.id=penawaran.id_customer')->findAll();

        $total = $total_hj = 0;
        foreach ($detail_procurement as $dt) {
            $total += $dt['hj_total'];
        }
        $jumlah = $total + $detail_procurement[0]['harga_jasa'];

        if ($detail_procurement) {
            $data = [
                "detail_procurement" => $detail_procurement,
                "judul" => 'print',
                "total" => $jumlah
            ];
            return view('admin/cetakQuotation', $data);
        } else {
            $_SESSION["success"] = '<div class="alert alert-warning" role="alert">Gagal memuat data..!</div>';
            return redirect()->to('admin/procurementConfirm');
        }
    }

    public function addCustomer()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'nama_perusahaan' => 'required|min_length[3]|max_length[255]',
            'pic'  => 'required',
        ])) {
            $this->customer->save([
                'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                'alamat'  => $this->request->getPost('alamat'),
                'pic'  => $this->request->getPost('pic'),
                'no_telp'  => $this->request->getPost('no_telp'),
                'email'  => $this->request->getPost('email'),
            ]);
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Customer berhasil ditambahkan</div>';
            return redirect()->to('/admin/inputData');
        } else {
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Gagal menambah customer</div>';
            echo view('admin/inputData');
        }
    }

    public function customerList()
    {
        $currentPage = $this->request->getVar('page_vendor') ? $this->request->getVar('page_vendor') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $isi = $this->customer->search($keyword);
        } else {
            $isi = $this->customer->getCustomer();
        }
        $data = [
            "judul" => "List Customers",
            'customerList' => $isi->paginate(6, 'customer'),
            'pager' => $isi->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/customerList', $data);
    }

    public function customerDelete($id)
    {
        $delete = $this->customer->where('id', $id)->delete();
        if ($delete) {
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Berhasil menghapus data</div>';
            return redirect()->to('/admin/customerList');
        } else {
            $_SESSION["danger"] = '<div class="alert alert-warning" role="alert">Gagal Menghapus data</div>';
            return redirect()->to('admin/customerList');
        }
    }
}
