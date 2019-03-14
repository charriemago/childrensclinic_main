<?php

class Home extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->render('views/home/index.php', true);
	}
	public function forgotPassword()
	{
		if(empty(Session::getSession('user'))){
			$this->view->render('views/home/forgotpass.php', true);
		} else {
			header("Location: ".URL);
		}
	}
	public function resetPassCheck(){
		$check = Db::selectByColumn(DATABASE_NAME, 'tbl_user', array('username' => $_POST['usernameReset']));
		if(!empty($check)){
			echo 1;
		} else {
			echo 2;
		}
	}
	public function resetPass(){
		$data['password'] = $_POST['password'];
		$data['modified_by'] = 1;
		$data['date_modified'] = date('Y-m-d H:i:s');
		Db::update(DATABASE_NAME, 'tbl_user', $data, array('username' => $_POST['username']));
	}

}

?>