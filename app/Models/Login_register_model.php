<?php
namespace App\Models;
use CodeIgniter\model;

class Login_register_model extends Model{
    public function register_user($table,$arr){
        
        $builder = $this->db->table($table);
        $builder = $builder->select("*");
        $builder = $builder->where(['email' => $arr['email']]);


        $count = count($builder->get()->getResultArray());
      
        if($count > 0){
            return false;
        }else{
            $builder = $this->db->table($table);
            $builder = $builder->insert($arr);
            if($builder){
                return true;
            }
        }
        
      
    }
    public function login_user($table,$arr){
        $builder = $this->db->table($table);
        $builder = $builder->select("*");
        $builder = $builder->where([
            'email' => $arr['email'],
            'password' => $arr['password']
        ]);


        $data = $builder->get()->getResultArray();
      
        if(count($data) == 1){
            return $data[0];
        }else{
            return false;
        }

    }
}



?>