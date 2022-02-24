<?php

namespace App\Controllers;

use App\Entities\UserEntity;
use App\Models\UsersModel;
use App\Models\GroupUserModel;
use App\Models\VendorModel;
use Myth\Auth\Models\UserModel;


class User extends BaseController
{
    protected $user_entity, $user_model, $vendor_model, $user_NotEntity;
    public function __construct()
    {
        $this->user_NotEntity = new UserModel();
        $this->vendor_model = new VendorModel();
        $this->user_entity = new UserEntity();
        $this->user_model = new UsersModel();
        $this->groupUser = new GroupUserModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    public function index()
    {
        $data = [
            "judul" => "User"
        ];
        return view('user/index', $data);
    }

    public function update_profile($id)
    {
        session();
        $cari = $this->user_NotEntity->where('id', $id)->first();
        $data = [
            'judul' => 'Update Profile',
            'data' => $cari,
            'validation' => \Config\Services::validation()

        ];
        return view('user/update_profile', $data);
    }

    public function update($id)
    {
        if(! $this->validate([
            'user_image' => [
                'rules' =>'max_size[user_image,5000]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan file gambar',
                    'mime_in' => 'Yang anda pilih bukan file gambar'
                ]
            ]
                ])){
            // $validation = \Config\Services::validation();
            return redirect()->back()->withInput();
        }

        $gambar_lama = $this->user_model->find($id);
        $file_image = $this->request->getFile('user_image');
        $hps_img = $gambar_lama->user_image;
        if($file_image->getError()==4){
            $nama_file = $gambar_lama->user_image;
        }else if($hps_img == 'default.svg'){
            $file_image->move('img');
            $nama_file = $file_image->getName();
        }else{
            unlink('img/' . $hps_img);
            $file_image->move('img');
            $nama_file = $file_image->getName();
        }
            $user = $this->user_model->find($id);
            // Updating
            if(\in_groups('vendor')) :
            $par = user()->username;
                $this->vendor_model->where('username', $par)->set([
                'fullname' => $this->request->getPost('fullname'),
                'phone' => $this->request->getPost('phone'),
                'username' => $this->request->getPost('username'),
            ])->update();
            endif;

            unset(
                $user->fullname,
                $user->email,
                $user->username,
                $user->phone,
                $user->user_image
            );

            if (!isset($user->fullname)) {
                $user->fullname = $this->request->getPost('fullname');
                $user->email = $this->request->getPost('email');
                $user->username = $this->request->getPost('username');
                $user->phone = $this->request->getPost('phone');
                $user->user_image = $nama_file;
            }
            $this->user_model->save($user);
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Profile Berhasil Diperbaruhi</div>';
            return redirect()->to('/admin/dashboard');
    }

    public function tambahUser()
    {
        $data = [
            'judul' => 'Tambah User'
        ];
        return view('admin/addUser', $data);
    }

    public function tambahVendorUser()
    {
        $data = [
            'judul' => 'Tambah vendor'
        ];
        return view('admin/addVendorUser', $data);
    }

    public function gantiPassword($id)
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[8]|alpha_numeric',
                'errors' => [
                    'required' => 'Isi field terlebih dahulu',
                    'min_length' => 'password minimal 8 karakter',
                    'alpha_numeric' => 'password harus menyertakan angka'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $user = $this->user_model->find($id);
        // Updating
        unset(
            $user->password
        );
        if (!isset($user->password)) {
            $user->password = $this->request->getPost('password');
        }
        $this->user_model->save($user);
        $_SESSION["success"] = '<div class="alert alert-success" role="alert">Profile Berhasil Diperbaruhi</div>';
        return redirect()->to('/admin/dashboard');
    }

    public function gantiPasswordVendor($id)
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[8]|alpha_numeric',
                'errors' => [
                    'required' => 'Isi field terlebih dahulu',
                    'min_length' => 'password minimal 8 karakter',
                    'alpha_numeric' => 'password harus menyertakan angka'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $user = $this->user_model->find($id);
        $vendor = $user->username;
        $param_vendor = $this->vendor_model->where('username', $vendor)->find();
        
        // Updating User
        unset(
            $param_vendor->password,
            $user->password
        );
        if (!isset($user->password)) {
            $user->password = $this->request->getPost('password');
            $param_vendor['password'] = $this->request->getPost('password');
        }
        // Updating Vendor

        $this->vendor_model->save($param_vendor);
        $this->user_model->save($user);
        $_SESSION["success"] = '<div class="alert alert-success" role="alert">Profile Berhasil Diperbaruhi</div>';
        return redirect()->to('/admin/dashboard');
    }

    public function deleteUser($id)
    {
        // hapus image
        $gambar_lama = $this->user_model->find($id);
        $hapusImg = $gambar_lama->user_image;
        if ($hapusImg != 'default.svg'){
            unlink('img/'. $hapusImg);
        }
        $cari = $this->user_NotEntity->where('id', $id)->first();
        $vendorName = $cari->vendor;
        $target = $this->user_model->delete($id);
        $this->builder->select('users.id as userid, username, email, name, vendor');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $users = $query->getResult();
        $data = [
            'judul' => 'User List',
            'us' => $users
        ];
        if ($target) {

            if ($this->vendor_model->where('vendor', $vendorName)->delete()) {
                $this->groupUser->where('user_id', $id)->delete();
            }
            $this->groupUser->where('user_id', $id)->delete();
            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Berhasil Menghapus data..</div>';
            return redirect()->to('admin/userList');
        } else {
            $_SESSION["success"] = '<div class="alert alert-warning" role="alert">gagal menghapus data..</div>';
            return view('admin/userList', $data);
        }
    }

    public function adduser()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            $user = $this->user_model;
            $isi = [
                'username'  => $this->request->getPost('username'),
                'email'     => $this->request->getPost('email'),
                'password'  => $this->request->getPost('password'),
                'phone'     => $this->request->getPost('phone'),
                'vendor'    => 'local user',
                'active'    => 1

            ];
            $entitas = $this->user_entity;
            $entitas->fill($isi);
            $user->withGroup($this->request->getPost('permision'));
            $user->save($entitas);

            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Data Tersimpan..</div>';
            return redirect()->to('admin/userList');
        } else {
            $data = [
                'judul' => 'Tambah User'
            ];
            $_SESSION["success"] = '<div class="alert alert-danger" role="alert">Gagal menyimpan data</div>';
            echo view('user/inputData', $data);
        }
    }

    public function addVendorUser()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            $user = $this->user_model;
            $input = new \App\Models\VendorModel();
            $isi = [
                'fullname' => $this->request->getPost('fullname'),
                'username'  => $this->request->getPost('username'),
                'email'     => $this->request->getPost('email'),
                'password'  => $this->request->getPost('password'),
                'phone'     => $this->request->getPost('phone'),
                'vendor'    => $this->request->getPost('vendor'),
                'active'    => 1

            ];

            $users = user()->username;
            $vendor = [
                'vendor' => $this->request->getPost('vendor'),
                'fullname' => $this->request->getPost('fullname'),
                'phone' => $this->request->getPost('phone'),
                'jabatan' => $this->request->getPost('jabatan'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'created_by' => $users
            ];

            $input->save($vendor);
            $entitas = $this->user_entity;
            $entitas->fill($isi);
            $user->withGroup('vendor');
            $user->save($entitas);

            $_SESSION["success"] = '<div class="alert alert-success" role="alert">Data Tersimpan</div>';
            return redirect()->to('admin/userList');
        } else {
            $data = [
                'judul' => 'Tambah User'
            ];
            $_SESSION["success"] = '<div class="alert alert-danger" role="alert">Gagal Menyimpan Data</div>';
            echo view('user/inputData', $data);
        }
    }
}
