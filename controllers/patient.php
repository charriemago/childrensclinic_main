<?php

include 'models/vaccine_model.php';

class Patient extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->patients = $this->model->all();
		$this->view->render('views/patient/list.php');
	}   
	
	public function info($id)
	{
		$this->view->patient_id = $id;
		$this->view->patient = $this->model->info($id);
		$this->view->vaccines = Vaccine_model::all();
		$this->view->getId = $id;
		$this->view->allVisits = $this->model->allVisits($id);
		$this->view->render('views/patient/record.php');
	}   

	public function add()
	{
		$this->view->vaccines = Vaccine_model::all();
		$this->view->render('views/patient/add.php');
	}   
	public function medication()
	{
		$this->view->medication = $this->model->getMedication();
		$this->view->render('views/patient/medication.php', true);
	}   
	public function vaccine()
	{
		$this->view->vaccines = Vaccine_model::all();
		$this->view->render('views/patient/vaccine.php', true);
	}   
	public function othervaccine()
	{
		$this->view->vaccines = Db::loadAll(DATABASE_NAME, 'tbl_other_fee');
		$this->view->render('views/patient/othervaccine.php', true);
	}   
	public function followupvisit()
	{
		$this->view->getId = $_POST['id'];
		$this->view->allVisits = $this->model->allVisits($_POST['id']);
		$this->view->render('views/patient/followupvisit.php', true);
	}   

	public function save()
	{
		$this->model->insert();
	}
	
	public function update()
	{
		$this->model->update();
	}
	public function delete()
	{
		$this->model->delete();
	}
	public function addMedication(){
		$this->model->addMedication();
	}
	public function updateImmunizationRecord(){
		$this->model->updateImmunizationRecord();
	}
	public function updateImmunizationRecordOther(){
		$this->model->updateImmunizationRecordOther();
	}

}

?>