<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_user', 'username_user', 'password_user'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    public function insert_user($data)
    {
        return $this->db->table('user')->insert($data);
    }

    // public function login($username_user, $password_user)
    // {
    //     return $this->db->table('user')->where('username_user', $username_user, 'password_user', md5($password_user))->get()->getRowArray();
    // }

    protected function beforeInsert(array $data){
        $data = $this->passwordHash($data);
    
        return $data;
      }
    
      protected function beforeUpdate(array $data){
        $data = $this->passwordHash($data);
    
        return $data;
      }
    
      protected function passwordHash(array $data){
        if(isset($data['data']['password']))
          $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    
        return $data;
      }
}