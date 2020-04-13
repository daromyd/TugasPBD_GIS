<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\UserModel;


class User extends BaseController
{
    protected $UserModel;

    public function __construct() 
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
		echo view ('v_login');
    }

    public function register()
	{
		echo view ('v_register');
    }
    
    public function save()
	{
		$data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username_user'  => $this->request->getPost('username_user'),
            'password_user' => md5($this->request->getPost('password_user')),
		];

        $this->UserModel->insert_user($data);
        session()->setFlashdata('success','User Berhasil Dibuat');
        return redirect()->to(base_url('user'));
    }

    

    /*public function login()
	{
		if ($this->exist($_POST)) {
            # code...
        }
    }

    private function exist($username_user, $password_user)
    {
        $UserModel = new UserModel();
        $user = $UserModel->where('username_user', $username_user)->first();
        if (password_verify != NULL) {
            return $user;
        } else {
            return NULL;
        }
    }*/


}
