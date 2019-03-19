<?php

include 'models/vaccine_model.php';

class Fee extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->fee = $this->model->all();
		$this->view->render('views/fee/fee.php');
    }
	public function other()
	{
		$this->view->fee = $this->model->allOther();
		$this->view->render('views/fee/other.php');
    }
	public function updateFee()
	{
		$this->model->updateFee();
  }
	public function addOther()
	{
		$this->model->addOther();
  }
	public function updateOther()
	{
		$this->model->updateOther();
  }
	public function deleteOther()
	{
		$this->model->deleteOther();
  }
}