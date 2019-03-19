<?php

class Followup_model extends Model
{   
    private  $table = 'tbl_patient';
    protected $user;
	function __construct()
	{
        parent::__construct();
        $this->user = Session::getSession('user');
    }

    public function all() {
        $data = DB::selectByColumn(DATABASE_NAME, $this->table, array('active' => 'yes'));
        return $data;
    }

    public function save() {
        // $result = 1;
        // foreach ($_POST['date_visit'] as $key => $each) { // this will if date in array is already exist.
        //     $date_visit = date('Y-m-d H:i:s', strtotime($_POST['date_visit'][$key]));
        //     $validate_visit = DB::selectByColumn(DATABASE_NAME, 'tbl_follow_up_visit', array('date_created' => $date_visit));
        //     if(empty($validate_visit)) {
        //         $result .= 1;
        //     } else {
        //         $result .= 0;
        //     }
        // }
       
        // if(strpos($result, '0') !== false) {
        //     echo 0;
        //     exit;
        // }
        Db::delete(DATABASE_NAME, 'tbl_follow_up_visit', array('patient_id' => $_POST['patient_id'])); 
        foreach ($_POST['date_visit'] as $key => $each) {
            
            // $date_visit = date('Y-m-d', strtotime($_POST['date_visit'][$key]));
            // $validate_visit = DB::selectByColumn(DATABASE_NAME, 'tbl_follow_up_visit', array('date_visit' => $each, 'patient_id' => $_POST['patient_id']));
            
            // if(empty($validate_visit)) {

                $data = [
                    'patient_id' => $_POST['patient_id'],
                    'age' => 0,
                    'weight' => isset($_POST['weight'][$key]) ? $_POST['weight'][$key] : '',
                    'height' => isset($_POST['height'][$key]) ? $_POST['height'][$key] : '',
                    'diagnosis_physician_notes' => $_POST['diagnosis'][$key],
                    'date_visit' => isset($_POST['date_visit'][$key]) ? $_POST['date_visit'][$key] : '0000-00-00 00:00:00',
                    'date_next' => isset($_POST['date_nextvisit'][$key]) ? $_POST['date_nextvisit'][$key]: '0000-00-00 00:00:00',
                    'created_by' => $this->user['id'],
                    'date_created' => date('Y-m-d H:i:s')
                ];
                DB::insert(DATABASE_NAME, 'tbl_follow_up_visit', $data);
            // }
        }
        echo 1;
    }
    
    public function allVisits($id) {
        $data = DB::selectByColumn(DATABASE_NAME, 'tbl_follow_up_visit', array('patient_id' => $id));
        return $data;
    }

}