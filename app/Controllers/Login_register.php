<?php
namespace App\Controllers;

use App\Models;
use App\Models\Login_register_model;


class Login_register extends Home{
    

    
    public function login_view()
	{
        echo view('header');
        echo view('login_register/login.php');
        echo view('footer');
	}
    public function register_view()
	{
        echo view('header');
        echo view('login_register/register.php');
        echo view('footer');
	}
    public function register_handle()
	{
        $request = \Config\Services::request();
        $model = new Login_register_model;    
        $user_registration_data = $request->getPost();
        $status = $model->register_user("users",$user_registration_data);
        if($status){
            echo "
            <script>
                alert('User Registered. Please Log in... ')
            </script>
            ";
            $this->login_view();
        }else{
            echo "
            <script>
                alert('oops there is a problem. please try again after some time... ')
            </script>
            ";
            redirect(base_url());

        }
	}
    public function login_handle(){
        $request = \Config\Services::request();
        $model = new Login_register_model;  
        $user_login_data = $request->getPost();
        $user_data = $model->login_user("users",$user_login_data);
        if($user_data){
            $session = session();
            $session->set([
                "name" => $user_data['name'],
                "is_logged" => true
            ]);

            
            
            $this->index();
        }else{
            echo "
            <script>
                alert('oops there is a problem. please try again after some time... ')
            </script>
            ";
            $this->index();
            

        }

    }
    public function logout(){
        $session = session();
        $session->remove(['name',"is_logged"]);
        $this->index();
    }


}
?>