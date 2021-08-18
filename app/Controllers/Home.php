<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function is_logged()
	{
		$session = session();
		if($session->has("is_logged")){

			
		}else{
			echo "
             <script>
                 alert('Please log in to view');
				 window.location.href='".base_url('login')."'
             </script>
          
          ";
		}
	}
	
	public function index()
	{
		// echo "
        //     <script>
        //         alert('User logged.')
        //     </script>
        //     <pre>
        //     ";
        //     print_r( $_SESSION);
        //     echo "</pre>";
		echo view('header');
		echo view('nav');
		echo view('main');
		echo view('footer');
	}
}
