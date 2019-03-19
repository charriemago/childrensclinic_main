<?php
include 'parent_model.php';

class Patient_model extends Model
{   
    protected $table = 'tbl_patient';

	function __construct()
	{
        parent::__construct();
        $this->user = Session::getSession('user');   
    }

    public function all() {
        $data = DB::selectByColumn(DATABASE_NAME, $this->table, array('active' => 'yes'));
        return $data;
    }

    public function info($id) {
        $data = DB::load(DATABASE_NAME, $this->table, $id);
        $data['parent'] = $this->parent($id);
        $data['birthHistory'] = $this->birthHistory($id);
        return $data;
    }
    
    public function checkName($patient_name) {
        $where = compact('patient_name');
        return Db::selectByColumn(DATABASE_NAME, $this->table, $where);
    }

    public function parent($patient_id) {
        return Parent_model::findByPatientId($patient_id);
    }

    public function birthHistory($patient_id) {
        $data = Db::selectByColumn(DATABASE_NAME, 'tbl_birth_history', array('patient_id' => $patient_id));
        return !empty($data) ? $data[0] : [];
    }
    public function delete(){
        $data['active'] = 'no';
        $data['modified_by'] = $this->user['id'];
        $data['date_modified'] = date('Y-m-d H:i:s');
        Db::update(DATABASE_NAME, 'tbl_patient', $data, array('id' => $_POST['id']));
    }
    public function insert() {
        $check =  $this->checkName($_POST['patient_name']);
        
        if(!empty($check)) {
            echo json_encode(['msg' => 'Patient has already saved on our records.']);
            http_response_code(400);
            exit;
        }

        $data = [
            'patient_name' => $_POST['patient_name'],
            'address' => $_POST['address'],
            'gender' => $_POST['gender'],
            'guardian_name' => $_POST['guardian_name'],
            'contact_no' => $_POST['contact_no'],
            'birthday' => $_POST['birthday'],
            'created_by' => $this->user['id']
        ];
        $patient_id = Db::insert(DATABASE_NAME, $this->table, $data);
        if($patient_id > 0) {
            $parent_id = $this->insertParent($patient_id);
            if($parent_id > 0) {
                $birth_history_id = $this->insertBirthHistory($patient_id);
                if($birth_history_id > 0) {
                    $this->insertImmunizationRecord($patient_id);
                    $this->insertOtherImmunizationRecord($patient_id);
                    echo json_encode([
                        'msg' => 'Record successfully saved'
                    ]);
                }
            }
        }

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
        // foreach ($_POST['date_visit'] as $key => $each) {
        //     $date_visit = date('Y-m-d', strtotime($_POST['date_visit'][$key]));
        //     $validate_visit = DB::selectByColumn(DATABASE_NAME, 'tbl_follow_up_visit', array('date_visit' => $date_visit, 'patient_id' => $patient_id));
            
        //     if(empty($validate_visit)) {

        //         $data = [
        //             'patient_id' => $patient_id,
        //             'age' => 0,
        //             'weight' => $_POST['weight'][$key],
        //             'height' => $_POST['height'][$key],
        //             'diagnosis_physician_notes' => $_POST['diagnosis'][$key],
        //             'date_visit' => $date_visit,
        //             'date_next' => $_POST['date_nextvisit'][$key],
        //             'created_by' => $this->user['id'],
        //             'date_created' => date('Y-m-d H:i:s')
        //         ];
        //         DB::insert(DATABASE_NAME, 'tbl_follow_up_visit', $data);
        //     }
        // }
    }

    public function insertParent($patientId) {
        $data = array(
            'patient_id' => $patientId,
            'father_name' => $_POST['father_name'],
            'father_occupation' => $_POST['father_occupation'],
            'father_telephone' => $_POST['father_telephone'],
            'mother_name' => $_POST['mother_name'],
            'mother_occupation' => $_POST['mother_occupation'],
            'mother_telephone' => $_POST['mother_telephone'],
            'created_by' => $this->user['id']
        );
        $id = Db::insert(DATABASE_NAME, 'tbl_parent', $data);
        return $id;
    }

    public function insertBirthHistory($patientId) {
        $data = array(
            'patient_id' => $patientId,
            'term' => isset($_POST['term']) ? $_POST['term'] : '',
            'no_of_mos' => isset($_POST['no_of_mos']) ? $_POST['no_of_mos'] : '',
            'weeks' => isset($_POST['weeks']) ? $_POST['weeks'] : '',
            'days' => isset($_POST['days']) ? $_POST['days'] : '',
            'type_of_delivery' => isset($_POST['type_of_delivery']) ? $_POST['type_of_delivery'] : '',
            'birth_weight' => isset($_POST['birth_weight']) ? $_POST['birth_weight'] : '',
            'birth_length' => isset($_POST['birth_length']) ? $_POST['birth_length'] : '',
            'blood_type' => isset($_POST['blood_type']) ? $_POST['blood_type'] : '',
            'head_circumference' => isset($_POST['head_circumference']) ? $_POST['head_circumference'] : '',
            'chest_circumference' => isset($_POST['chest_circumference']) ? $_POST['chest_circumference'] : '',
            'abdominal_circumference' => isset($_POST['abdominal_circumference']) ? $_POST['abdominal_circumference'] : '',
            'diagnosis_notes' => isset($_POST['diagnosis_notes']) ? $_POST['diagnosis_notes'] : '',
            'medication_notes' => isset($_POST['medication_notes']) ? $_POST['medication_notes'] : '',
            'created_by' => $this->user['id']
        );
        $id = Db::insert(DATABASE_NAME, 'tbl_birth_history', $data);
        return $id;
    }

    public function insertImmunizationRecord($patientId) {
        $vaccines = Vaccine_model::all();
        foreach($vaccines as $vaccine) {
            $data = array(
                'patient_id' => $patientId,
                'vaccine_id' => $vaccine['id'],
                'reaction' => '',
                'created_by' => $this->user['id']
            );
            $id = Db::insert(DATABASE_NAME, 'tbl_immunization_record', $data);
        }
    }
    public function insertOtherImmunizationRecord($patientId) {
        $vaccines = Db::loadAll(DATABASE_NAME, 'tbl_other_fee');
        foreach($vaccines as $vaccine) {
            $data = array(
                'patient_id' => $patientId,
                'other_fee_id' => $vaccine['id'],
                'reaction' => '',
                'created_by' => $this->user['id']
            );
            $id = Db::insert(DATABASE_NAME, 'tbl_immunization_record_other', $data);
        }
    }

    public function update() {
        $check =  $this->checkName($_POST['patient_name']);
        
        if(!empty($check)) {
            if($check[0]['id'] != $_POST['patient_id']) {
                echo json_encode(['msg' => 'Patient has already saved on our records.']);
                http_response_code(400);
                exit;
            }
        }

        $patient = $this->info($_POST['patient_id']);
        
        if(!empty($patient)) {
            $where = [
                'id' => $patient['id']
            ];

            $parent = $patient['parent'];
            unset($patient['parent']);
            
            $birthHistory = $patient['birthHistory'];
            unset($patient['birthHistory']);
            
            $data = $patient;
            unset($data['id']);
        
            $data['patient_name'] = $_POST['patient_name'];
            $data['address'] = $_POST['address'];
            $data['gender'] = $_POST['gender'];
            $data['guardian_name'] = $_POST['guardian_name'];
            $data['contact_no'] = $_POST['contact_no'];
            $data['birthday'] = $_POST['birthday'];
            $data['modified_by'] = $this->user['id'];
            Db::update(DATABASE_NAME, $this->table, $data, $where);
            
            $this->updateParent($parent);
            $this->updateBirthHistory($birthHistory);
            // $this->updateImmunizationRecord($patient['id']); 
                
            echo json_encode([
                'msg' => 'Record successfully saved'
            ]);
        }
    }

    public function updateParent($data = []) {
        $where = [
            'id' => $data['id']
        ];
        unset($data['id']);

        $data['father_name'] = $_POST['father_name'];
        $data['father_occupation'] = $_POST['father_occupation'];
        $data['father_telephone'] = $_POST['father_telephone'];
        $data['mother_name'] = $_POST['mother_name'];
        $data['mother_occupation'] = $_POST['mother_occupation'];
        $data['mother_telephone'] = $_POST['mother_telephone'];
        Db::update(DATABASE_NAME, 'tbl_parent', $data, $where);
    }

    public function updateBirthHistory($data = []) {
        $where = [
            'id' => $data['id']
        ]; 
        unset($data['id']);

        $data['term'] = isset($_POST['term']) ? $_POST['term'] : '';
        $data['no_of_mos'] = isset($_POST['no_of_mos']) ? $_POST['no_of_mos'] : '';
        $data['weeks'] = isset($_POST['weeks']) ? $_POST['weeks'] : '';
        $data['days'] = isset($_POST['days']) ? $_POST['days'] : '';
        $data['type_of_delivery'] = isset($_POST['type_of_delivery']) ? $_POST['type_of_delivery'] : '';
        $data['birth_weight'] = isset($_POST['birth_weight']) ? $_POST['birth_weight'] : '';
        $data['birth_length'] = isset($_POST['birth_length']) ? $_POST['birth_length'] : '';
        $data['blood_type'] = isset($_POST['blood_type']) ? $_POST['blood_type'] : '';
        $data['head_circumference'] = isset($_POST['head_circumference']) ? $_POST['head_circumference'] : '';
        $data['chest_circumference'] = isset($_POST['chest_circumference']) ? $_POST['chest_circumference'] : '';
        $data['abdominal_circumference'] = isset($_POST['abdominal_circumference']) ? $_POST['abdominal_circumference'] : '';
        $data['diagnosis_notes'] = isset($_POST['diagnosis_notes']) ? $_POST['diagnosis_notes'] : '';
        $data['medication_notes'] = isset($_POST['medication_notes']) ? $_POST['medication_notes'] : '';
        $data['modified_by'] = $this->user['id'];
        $data['date_modified'] = date('Y-m-d H:i:s');

        Db::update(DATABASE_NAME, 'tbl_birth_history', $data, $where);
    }

    public function updateImmunizationRecord() {
        $patientId = $_POST['patient_id'];
        $vaccines = Vaccine_model::all();
        foreach($vaccines as $vaccine) {
            $where1 = [
                'patient_id' => $patientId,
                'vaccine_id' => $vaccine['id'],
            ];
            
            $record = Db::selectByColumn(DATABASE_NAME, 'tbl_immunization_record', $where1);
            if(!empty($record)) {
                $data = $record[0];
                $where2 = [
                    'id' => $data['id']
                ];
                unset($data['id']);

                $updateRecord['1st'] = isset($_POST['1st'][$vaccine['id']]) ? $_POST['1st'][$vaccine['id']] : '0000-00-00 00:00:00';
                $updateRecord['2nd'] = isset($_POST['2nd'][$vaccine['id']]) ? $_POST['2nd'][$vaccine['id']] : '0000-00-00 00:00:00';
                $updateRecord['3rd'] = isset($_POST['3rd'][$vaccine['id']]) ? $_POST['3rd'][$vaccine['id']] : '0000-00-00 00:00:00';
                $updateRecord['Booster_1'] = isset($_POST['Booster_1'][$vaccine['id']]) ? $_POST['Booster_1'][$vaccine['id']] : '0000-00-00 00:00:00';
                $updateRecord['Booster_2'] = isset($_POST['Booster_2'][$vaccine['id']]) ? $_POST['Booster_2'][$vaccine['id']] : '0000-00-00 00:00:00';
                $updateRecord['Booster_3'] = isset($_POST['Booster_3'][$vaccine['id']]) ? $_POST['Booster_3'][$vaccine['id']] : '0000-00-00 00:00:00';
                $updateRecord['reaction'] = $_POST['reaction'][$vaccine['id']];
                $updateRecord['modified_by'] = $this->user['id'];
                $updateRecord['date_modified'] = date('Y-m-d H:i:s');
                Db::update(DATABASE_NAME, 'tbl_immunization_record', $updateRecord, $where2);
            } else {
                $data = array(
                    'patient_id' => $patientId,
                    'vaccine_id' => $vaccine['id'],
                    '1st' => isset($_POST['1st'][$vaccine['id']]) ? $_POST['1st'][$vaccine['id']] : '0000-00-00 00:00:00',
                    '2nd' => isset($_POST['2nd'][$vaccine['id']]) ? $_POST['2nd'][$vaccine['id']] : '0000-00-00 00:00:00',
                    '3rd' => isset($_POST['3rd'][$vaccine['id']]) ? $_POST['3rd'][$vaccine['id']] : '0000-00-00 00:00:00',
                    'Booster_1' => isset($_POST['Booster_1'][$vaccine['id']]) ? $_POST['Booster_1'][$vaccine['id']] : '0000-00-00 00:00:00',
                    'Booster_2' => isset($_POST['Booster_2'][$vaccine['id']]) ? $_POST['Booster_2'][$vaccine['id']] : '0000-00-00 00:00:00',
                    'Booster_3' => isset($_POST['Booster_3'][$vaccine['id']]) ? $_POST['Booster_3'][$vaccine['id']] : '0000-00-00 00:00:00',
                    'reaction' => $_POST['reaction'][$vaccine['id']],
                    'created_by' => $this->user['id']
                );
                $id = Db::insert(DATABASE_NAME, 'tbl_immunization_record', $data);
            }
        }
    }
    public function updateImmunizationRecordOther() {
        $patientId = $_POST['patient_id'];
        $vaccines = Db::loadAll(DATABASE_NAME, 'tbl_other_fee');
        foreach($vaccines as $vaccine) {
            $where1 = [
                'patient_id' => $patientId,
                'other_fee_id' => $vaccine['id'],
            ];
            $record = Db::selectByColumn(DATABASE_NAME, 'tbl_immunization_record_other', $where1);
            if(!empty($record)) {
                $data = $record[0];
                $where2 = [
                    'id' => $data['id']
                ];
                unset($data['id']);

                $updateRecord['date_shot'] = isset($_POST['date_shot'][$vaccine['id']]) ? $_POST['date_shot'][$vaccine['id']] : '0000-00-00 00:00:00';
                $updateRecord['reaction'] = $_POST['reaction'][$vaccine['id']];
                $updateRecord['modified_by'] = $this->user['id'];
                $updateRecord['date_modified'] = date('Y-m-d H:i:s');
                Db::update(DATABASE_NAME, 'tbl_immunization_record_other', $updateRecord, $where2);
            } else {
                $data = array(
                    'patient_id' => $patientId,
                    'other_fee_id' => $vaccine['id'],
                    'date_shot' => isset($_POST['date_shot'][$vaccine['id']]) ? $_POST['date_shot'][$vaccine['id']] : '0000-00-00 00:00:00',
                    'reaction' => $_POST['reaction'][$vaccine['id']],
                    'created_by' => $this->user['id']
                );
                $id = Db::insert(DATABASE_NAME, 'tbl_immunization_record_other', $data);
            }
        }
    }
    public function allVisits($id) {
        $data = DB::selectByColumn(DATABASE_NAME, 'tbl_follow_up_visit', array('patient_id' => $id));
        return $data;
    }
    public function getMedication() {
        $data = DB::selectByColumn(DATABASE_NAME, 'tbl_medication', array('patient_id' => $_POST['id']));
        return $data;
    }
    public function getVaccine() {
        $data = DB::selectByColumn(DATABASE_NAME, 'tbl_immunization_record', array('patient_id' => $_POST['id']));
        return $data;
    }
    public function addMedication() {
        DB::delete(DATABASE_NAME, 'tbl_medication', array('patient_id' => $_POST['patient_id']));
        foreach($_POST['date_of_prescription'] as $key=> $each){
            $data = array(
                'patient_id' => $_POST['patient_id'],
                'date_of_prescription' => $each,
                'prescription' => $_POST['prescription'][$key],
                'created_by' => $this->user['id']
            );
            $id = Db::insert(DATABASE_NAME, 'tbl_medication', $data);
        }
    }
}